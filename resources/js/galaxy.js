import * as THREE from 'three';

/* ── state ───────────────────────────────────────────────── */
let scene, camera, renderer, clock;
let starField1, starField2, galaxySpiral, portalVortex;
let nebulaGroups = [], dustClouds = [], planets = [], shootingStars = [];
let mouseX = 0, mouseY = 0, targetX = 0, targetY = 0;

/* ══════════════════════════════════════════════════════════
   INIT
══════════════════════════════════════════════════════════ */
function init() {
    clock = new THREE.Clock();

    const canvas = document.getElementById('galaxy-canvas');
    if (!canvas) return;

    scene = new THREE.Scene();
    scene.fog = new THREE.FogExp2(0x06001e, 0.00042);

    camera = new THREE.PerspectiveCamera(65, window.innerWidth / window.innerHeight, 0.1, 4000);
    camera.position.set(0, 18, 90);

    renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: false });
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setClearColor(0x04001a);
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.4;

    buildBackgroundStars();
    buildForegroundStars();
    buildGalaxySpiral();
    buildNebulaClouds();
    buildDustLayers();
    buildPortalVortex();
    buildPlanets();
    buildLights();

    window.addEventListener('resize', onResize);
    document.addEventListener('mousemove', onMouseMove);
    animate();
}

/* ══════════════════════════════════════════════════════════
   BACKGROUND STARS – deep sphere, many tiny coloured dots
══════════════════════════════════════════════════════════ */
function buildBackgroundStars() {
    const N = 30000;
    const pos = new Float32Array(N * 3);
    const col = new Float32Array(N * 3);

    // lavender / purple / blue-violet / pink-white palette
    const pal = [
        [1.0,  0.90, 1.0 ],
        [0.75, 0.50, 1.0 ],
        [0.55, 0.35, 0.98],
        [0.88, 0.78, 1.0 ],
        [0.97, 0.88, 1.0 ],
        [0.42, 0.58, 1.0 ],
        [1.0,  0.62, 0.92],
        [0.65, 0.30, 0.95],
    ];

    for (let i = 0; i < N; i++) {
        const i3 = i * 3;
        const phi   = Math.acos(2 * Math.random() - 1);
        const theta = Math.random() * Math.PI * 2;
        const r     = 900 + Math.random() * 2400;
        pos[i3]     = r * Math.sin(phi) * Math.cos(theta);
        pos[i3 + 1] = r * Math.sin(phi) * Math.sin(theta);
        pos[i3 + 2] = r * Math.cos(phi);

        const c = pal[Math.floor(Math.random() * pal.length)];
        const v = 0.65 + Math.random() * 0.35;
        col[i3] = c[0]*v; col[i3+1] = c[1]*v; col[i3+2] = c[2]*v;
    }

    const geo = new THREE.BufferGeometry();
    geo.setAttribute('position', new THREE.BufferAttribute(pos, 3));
    geo.setAttribute('color',    new THREE.BufferAttribute(col, 3));
    starField1 = new THREE.Points(geo, new THREE.PointsMaterial({
        size: 0.55, vertexColors: true, transparent: true, opacity: 0.85, sizeAttenuation: true,
    }));
    scene.add(starField1);
}

/* ══════════════════════════════════════════════════════════
   FOREGROUND STARS – bigger, closer, parallax contrast
══════════════════════════════════════════════════════════ */
function buildForegroundStars() {
    const N = 7000;
    const pos = new Float32Array(N * 3);
    const col = new Float32Array(N * 3);

    for (let i = 0; i < N; i++) {
        const i3 = i * 3;
        pos[i3]     = (Math.random() - 0.5) * 1400;
        pos[i3 + 1] = (Math.random() - 0.5) * 900;
        pos[i3 + 2] = -80 - Math.random() * 700;

        const t = Math.random();
        if (t < 0.45) { col[i3]=0.82; col[i3+1]=0.70; col[i3+2]=1.0; }
        else if (t < 0.75) { col[i3]=0.58; col[i3+1]=0.38; col[i3+2]=1.0; }
        else { col[i3]=1.0; col[i3+1]=0.82; col[i3+2]=0.96; }
    }

    const geo = new THREE.BufferGeometry();
    geo.setAttribute('position', new THREE.BufferAttribute(pos, 3));
    geo.setAttribute('color',    new THREE.BufferAttribute(col, 3));
    starField2 = new THREE.Points(geo, new THREE.PointsMaterial({
        size: 1.1, vertexColors: true, transparent: true, opacity: 0.78, sizeAttenuation: true,
    }));
    scene.add(starField2);
}

/* ══════════════════════════════════════════════════════════
   GALAXY SPIRAL – 4 arm structure with lavender/purple tints
══════════════════════════════════════════════════════════ */
function buildGalaxySpiral() {
    const N    = 130000;
    const arms = 4;
    const pos  = new Float32Array(N * 3);
    const col  = new Float32Array(N * 3);

    const armPal = [
        [0.90, 0.58, 1.00],   // arm 0 – pale lavender
        [0.62, 0.32, 1.00],   // arm 1 – mid purple
        [1.00, 0.70, 0.96],   // arm 2 – pink-lavender
        [0.48, 0.26, 0.95],   // arm 3 – deep violet
    ];

    for (let i = 0; i < N; i++) {
        const i3    = i * 3;
        const arm   = i % arms;
        const t     = Math.pow(i / N, 0.85) * 2.6;
        const r     = 28 + t * 165;
        const angle = t * Math.PI * 2 + (arm / arms) * Math.PI * 2;
        const jr    = (Math.random() - 0.5) * r * 0.42;
        const jy    = (Math.random() - 0.5) * 16 * (1 - t * 0.28);

        pos[i3]     = (r + jr) * Math.cos(angle);
        pos[i3 + 1] = jy;
        pos[i3 + 2] = -680 + (r + jr) * Math.sin(angle) * 0.32;

        const c  = armPal[arm];
        const br = 0.50 + Math.random() * 0.50;
        const core = Math.max(0, 1 - r / 300) * 0.5;
        col[i3]     = Math.min(1, c[0] * br + core);
        col[i3 + 1] = Math.min(1, c[1] * br + core * 0.15);
        col[i3 + 2] = Math.min(1, c[2] * br + core * 0.5);
    }

    const geo = new THREE.BufferGeometry();
    geo.setAttribute('position', new THREE.BufferAttribute(pos, 3));
    geo.setAttribute('color',    new THREE.BufferAttribute(col, 3));
    galaxySpiral = new THREE.Points(geo, new THREE.PointsMaterial({
        size: 1.15, vertexColors: true, transparent: true, opacity: 0.90, sizeAttenuation: true, depthWrite: false,
    }));
    scene.add(galaxySpiral);
}

/* ══════════════════════════════════════════════════════════
   NEBULA CLOUDS – 8 large volumetric purple/lavender regions
══════════════════════════════════════════════════════════ */
function buildNebulaClouds() {
    const cfgs = [
        { hex: 0x9900dd, cx: -70,  cy:  55,  cz: -560, spread: 230, N: 20000, sz: 4.0, op: 0.50 },
        { hex: 0x220099, cx:  190, cy: -25,  cz: -490, spread: 190, N: 15000, sz: 3.4, op: 0.44 },
        { hex: 0xbb66ff, cx:   25, cy:  165, cz: -620, spread: 170, N: 13000, sz: 3.6, op: 0.40 },
        { hex: 0x660099, cx: -230, cy: -75,  cz: -430, spread: 150, N: 11000, sz: 3.0, op: 0.46 },
        { hex: 0xee99ff, cx:  -15, cy:   8,  cz: -510, spread:  75, N:  8000, sz: 1.8, op: 0.58 }, // bright core
        { hex: 0x440066, cx:  110, cy: -185, cz: -530, spread: 210, N: 12000, sz: 4.4, op: 0.36 },
        { hex: 0xcc3399, cx: -145, cy:  125, cz: -460, spread: 120, N:  9000, sz: 2.6, op: 0.42 },
        { hex: 0x110033, cx:    0, cy:    0, cz: -820, spread: 380, N: 22000, sz: 5.8, op: 0.28 }, // deep background
    ];

    cfgs.forEach(cfg => {
        const pos = new Float32Array(cfg.N * 3);
        const col = new Float32Array(cfg.N * 3);
        const base = new THREE.Color(cfg.hex);

        for (let i = 0; i < cfg.N; i++) {
            const i3 = i * 3;
            const phi   = Math.random() * Math.PI;
            const theta = Math.random() * Math.PI * 2;
            const r     = Math.pow(Math.random(), 0.55) * cfg.spread;
            pos[i3]     = cfg.cx + r * Math.sin(phi) * Math.cos(theta);
            pos[i3 + 1] = cfg.cy + r * Math.cos(phi) * 0.48;
            pos[i3 + 2] = cfg.cz + r * Math.sin(phi) * Math.sin(theta) * 0.58;

            const v = (Math.random() - 0.5) * 0.48;
            col[i3]     = Math.max(0, Math.min(1, base.r + v));
            col[i3 + 1] = Math.max(0, Math.min(1, base.g + v * 0.55));
            col[i3 + 2] = Math.max(0, Math.min(1, base.b + v * 0.12));
        }

        const geo = new THREE.BufferGeometry();
        geo.setAttribute('position', new THREE.BufferAttribute(pos, 3));
        geo.setAttribute('color',    new THREE.BufferAttribute(col, 3));
        const mesh = new THREE.Points(geo, new THREE.PointsMaterial({
            size: cfg.sz, vertexColors: true, transparent: true, opacity: cfg.op, sizeAttenuation: true, depthWrite: false,
        }));
        scene.add(mesh);
        nebulaGroups.push(mesh);
    });
}

/* ══════════════════════════════════════════════════════════
   DUST LAYERS – fine interstellar filament haze
══════════════════════════════════════════════════════════ */
function buildDustLayers() {
    [
        { hex: 0x7700aa, z: -280, N: 32000, spread: 650, op: 0.20, sz: 1.6 },
        { hex: 0x3a0066, z: -520, N: 42000, spread: 950, op: 0.15, sz: 2.4 },
        { hex: 0x210040, z: -740, N: 28000, spread: 750, op: 0.13, sz: 3.2 },
    ].forEach(cfg => {
        const pos = new Float32Array(cfg.N * 3);
        const col = new Float32Array(cfg.N * 3);
        const base = new THREE.Color(cfg.hex);

        for (let i = 0; i < cfg.N; i++) {
            const i3 = i * 3;
            pos[i3]     = (Math.random() - 0.5) * cfg.spread;
            pos[i3 + 1] = (Math.random() - 0.5) * cfg.spread * 0.48;
            pos[i3 + 2] = cfg.z + (Math.random() - 0.5) * 220;
            const v = (Math.random() - 0.5) * 0.32;
            col[i3]     = Math.max(0, Math.min(1, base.r + v * 0.55));
            col[i3 + 1] = Math.max(0, Math.min(1, base.g + v * 0.30));
            col[i3 + 2] = Math.max(0, Math.min(1, base.b + v));
        }

        const geo = new THREE.BufferGeometry();
        geo.setAttribute('position', new THREE.BufferAttribute(pos, 3));
        geo.setAttribute('color',    new THREE.BufferAttribute(col, 3));
        const mesh = new THREE.Points(geo, new THREE.PointsMaterial({
            size: cfg.sz, vertexColors: true, transparent: true, opacity: cfg.op, sizeAttenuation: true, depthWrite: false,
        }));
        scene.add(mesh);
        dustClouds.push(mesh);
    });
}

/* ══════════════════════════════════════════════════════════
   PORTAL VORTEX – tight-coil white-to-purple wormhole
══════════════════════════════════════════════════════════ */
function buildPortalVortex() {
    const N   = 18000;
    const pos = new Float32Array(N * 3);
    const col = new Float32Array(N * 3);

    for (let i = 0; i < N; i++) {
        const i3    = i * 3;
        const t     = i / N;
        const angle = t * Math.PI * 2 * 30;
        const r     = t * 85;
        const jit   = (Math.random() - 0.5) * (9 + t * 14);

        pos[i3]     = Math.cos(angle) * r + jit;
        pos[i3 + 1] = Math.sin(angle) * r * 0.58 + jit * 0.45;
        pos[i3 + 2] = -545 + (1 - t) * 170 + jit * 0.28;

        const s = 1 - t;             // bright at centre, purple at edge
        col[i3]     = 0.82 + s * 0.18;
        col[i3 + 1] = 0.28 * s;
        col[i3 + 2] = 0.78 + (1 - s) * 0.22;
    }

    const geo = new THREE.BufferGeometry();
    geo.setAttribute('position', new THREE.BufferAttribute(pos, 3));
    geo.setAttribute('color',    new THREE.BufferAttribute(col, 3));
    portalVortex = new THREE.Points(geo, new THREE.PointsMaterial({
        size: 1.0, vertexColors: true, transparent: true, opacity: 0.95, sizeAttenuation: true, depthWrite: false,
    }));
    scene.add(portalVortex);
}

/* ══════════════════════════════════════════════════════════
   PLANETS – 4 planets with halos & rings
══════════════════════════════════════════════════════════ */
function buildPlanets() {
    /* helpers */
    const mkMat = (c, e, ei, sh, sp) =>
        new THREE.MeshPhongMaterial({ color: c, emissive: e, emissiveIntensity: ei, shininess: sh, specular: sp });
    const halo = (r, col) => new THREE.Mesh(
        new THREE.SphereGeometry(r, 24, 24),
        new THREE.MeshBasicMaterial({ color: col, transparent: true, opacity: 0.07, side: THREE.BackSide })
    );

    // P1 – large ringed gas giant (deep violet)
    const g1 = new THREE.Group();
    const m1 = new THREE.Mesh(new THREE.SphereGeometry(30, 64, 64), mkMat(0x40007a, 0x240045, 0.85, 130, 0xdd44ff));
    g1.add(m1);
    g1.add(halo(38, 0x9933ff));

    [[36, 56, 0x9944cc, 0.55, 2.45], [58, 68, 0x5522aa, 0.28, 2.35]].forEach(([inn, out, cl, op, tlt]) => {
        const rng = new THREE.Mesh(
            new THREE.RingGeometry(inn, out, 256),
            new THREE.MeshBasicMaterial({ color: cl, side: THREE.DoubleSide, transparent: true, opacity: op })
        );
        rng.rotation.x = tlt;
        g1.add(rng);
    });

    g1.position.set(-255, -65, -430);
    scene.add(g1);
    planets.push({ group: g1, mesh: m1, ry: 0.0022, rx: 0.0004, amp: 13, spd: 0.28, by: -65 });

    // P2 – medium lavender-blue ice world with halo
    const g2 = new THREE.Group();
    const m2 = new THREE.Mesh(new THREE.SphereGeometry(18, 64, 64), mkMat(0x1a2ccc, 0x0a1166, 0.75, 200, 0xaabbff));
    g2.add(m2);
    g2.add(halo(23, 0x4466ff));
    g2.position.set(265, 105, -305);
    scene.add(g2);
    planets.push({ group: g2, mesh: m2, ry: 0.004, rx: 0.001, amp: 8, spd: 0.46, by: 105 });

    // P3 – small dark violet moon
    const g3 = new THREE.Group();
    const m3 = new THREE.Mesh(new THREE.SphereGeometry(10, 32, 32), mkMat(0x1e0042, 0x0f0028, 0.65, 65, 0xff00ff));
    g3.add(m3);
    g3.position.set(145, -158, -495);
    scene.add(g3);
    planets.push({ group: g3, mesh: m3, ry: 0.007, rx: 0.002, amp: 15, spd: 0.20, by: -158 });

    // P4 – tiny far pink dwarf
    const g4 = new THREE.Group();
    const m4 = new THREE.Mesh(new THREE.SphereGeometry(6, 24, 24), mkMat(0x660033, 0x330022, 0.55, 45, 0xff44bb));
    g4.add(m4);
    g4.position.set(355, -28, -355);
    scene.add(g4);
    planets.push({ group: g4, mesh: m4, ry: 0.009, rx: 0.003, amp: 6, spd: 0.62, by: -28 });
}

/* ══════════════════════════════════════════════════════════
   LIGHTS
══════════════════════════════════════════════════════════ */
function buildLights() {
    scene.add(new THREE.AmbientLight(0x0d0040, 4));
    [
        [0xcc00ff, 14, 950, -120, 145, -45],
        [0x4400cc,  9, 750,  260, -85, -65],
        [0xcc88ff,  5, 550,    0, 270,  85],
        [0xff00aa,  4, 420,  -85,-205, 115],
        [0xffffff,  7, 380,    0,   0,-545],
        [0xee99ff,  8, 650,  -55,  35,-660],
    ].forEach(([c, i, d, x, y, z]) => {
        const l = new THREE.PointLight(c, i, d);
        l.position.set(x, y, z);
        scene.add(l);
    });
}

/* ══════════════════════════════════════════════════════════
   SHOOTING STARS
══════════════════════════════════════════════════════════ */
function spawnShootingStar() {
    const len = 55 + Math.random() * 95;
    const sx  = (Math.random() - 0.5) * 850;
    const sy  = 140 + Math.random() * 230;
    const sz  = (Math.random() - 0.5) * 320 - 110;
    const dx  = -(0.7 + Math.random() * 0.6);
    const dy  = -(0.28 + Math.random() * 0.38);

    const geo = new THREE.BufferGeometry();
    geo.setAttribute('position', new THREE.BufferAttribute(
        new Float32Array([sx, sy, sz, sx + dx*len, sy + dy*len, sz]), 3
    ));

    const colors = [0xffffff, 0xddaaff, 0xffbbee, 0xbbaaff];
    const mat    = new THREE.LineBasicMaterial({ color: colors[Math.floor(Math.random()*colors.length)], transparent: true, opacity: 1 });
    const line   = new THREE.Line(geo, mat);
    scene.add(line);

    const vel = new THREE.Vector3(dx, dy, 0).normalize().multiplyScalar(3.5 + Math.random() * 2.2);
    shootingStars.push({ mesh: line, velocity: vel, life: 1.0, decay: 0.016 + Math.random() * 0.018 });
}

/* ══════════════════════════════════════════════════════════
   RESIZE / MOUSE
══════════════════════════════════════════════════════════ */
function onResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
}
function onMouseMove(e) {
    targetX =  (e.clientX / window.innerWidth  - 0.5) * 30;
    targetY = -(e.clientY / window.innerHeight - 0.5) * 20;
}

/* ══════════════════════════════════════════════════════════
   RENDER LOOP
══════════════════════════════════════════════════════════ */
function animate() {
    requestAnimationFrame(animate);
    const t = clock.getElapsedTime();

    // background star sphere – slow drift
    if (starField1) { starField1.rotation.y = t * 0.005; starField1.rotation.x = t * 0.002; }
    // foreground stars – slightly faster, different axis
    if (starField2) { starField2.rotation.y = t * 0.011; starField2.rotation.z = t * 0.003; }
    // galaxy spiral
    if (galaxySpiral) { galaxySpiral.rotation.y = t * 0.020; galaxySpiral.rotation.x = Math.sin(t * 0.035) * 0.05; }
    // nebula clouds drift
    nebulaGroups.forEach((n, k) => { n.rotation.z = t * (0.007 + k * 0.002); n.rotation.y = t * (0.004 + k * 0.001); });
    // dust layers
    dustClouds.forEach((d, k) => { d.rotation.z = t * (0.004 + k * 0.002); });
    // portal vortex
    if (portalVortex) { portalVortex.rotation.z = t * 0.24; portalVortex.material.opacity = 0.88 + Math.sin(t * 1.4) * 0.08; }
    // planets float
    planets.forEach((p, k) => {
        p.mesh.rotation.y += p.ry;
        p.mesh.rotation.x += p.rx;
        p.group.position.y = p.by + Math.sin(t * p.spd + k) * p.amp;
    });

    // smooth camera parallax
    mouseX += (targetX - mouseX) * 0.024;
    mouseY += (targetY - mouseY) * 0.024;
    camera.position.x = mouseX;
    camera.position.y = 18 + mouseY;
    camera.lookAt(0, 5, -200);

    // shooting stars
    if (Math.random() < 0.010) spawnShootingStar();
    shootingStars = shootingStars.filter(s => {
        s.life -= s.decay;
        s.mesh.material.opacity = Math.max(0, s.life);
        const p = s.mesh.geometry.attributes.position.array;
        p[0] += s.velocity.x; p[1] += s.velocity.y;
        p[3] += s.velocity.x; p[4] += s.velocity.y;
        s.mesh.geometry.attributes.position.needsUpdate = true;
        if (s.life <= 0) { scene.remove(s.mesh); s.mesh.geometry.dispose(); s.mesh.material.dispose(); return false; }
        return true;
    });

    renderer.render(scene, camera);
}

/* ── boot ─────────────────────────────────────────────── */
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}

