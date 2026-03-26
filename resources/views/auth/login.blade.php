<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Surogon Pageant 2026 — Access Portal</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/SDN_LOGO.svg') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Cormorant+Garamond:ital,wght@0,300;1,300&family=Rajdhani:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/sass/app.scss'])

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html, body {
            width: 100%; height: 100%;
            overflow: hidden;
            font-family: 'Rajdhani', sans-serif;
        }

        /* ── Background: navy blue + purple + gold — no image ── */
        body {
            background:
                radial-gradient(ellipse 120% 100% at 50% 50%,
                    #1a004a 0%,
                    #0d0030 40%,
                    #060020 100%
                );
        }

        /* ── Layer 1: diagonal gold + purple sweep ── */
        body::before {
            content: '';
            position: fixed; inset: 0;
            background: linear-gradient(
                135deg,
                rgba(10, 0, 60, 0.95)   0%,
                rgba(45, 5, 100, 0.85) 20%,
                rgba(15, 10, 55, 0.80) 40%,
                rgba(80, 45, 0, 0.70)  65%,
                rgba(120, 75, 0, 0.80) 82%,
                rgba(60, 30, 0, 0.90) 100%
            );
            z-index: 0;
        }

        /* ── Layer 2: radial gold bloom center + deep navy edges ── */
        body::after {
            content: '';
            position: fixed; inset: 0;
            background:
                radial-gradient(ellipse 75% 65% at 50% 50%,
                    rgba(201,168,76,0.22)  0%,
                    rgba(80,20,180,0.35)  45%,
                    rgba(5,0,25,0.75)    100%
                );
            z-index: 0;
        }

        /* ── Layer 3: animated gold + purple aura blobs ── */
        .color-aura {
            position: fixed; inset: 0;
            z-index: 0;
            pointer-events: none;
            background:
                radial-gradient(ellipse 60% 55% at 15% 25%, rgba(138,79,255,0.30) 0%, transparent 65%),
                radial-gradient(ellipse 50% 50% at 85% 75%, rgba(201,168,76,0.28) 0%, transparent 65%),
                radial-gradient(ellipse 45% 40% at 70% 15%, rgba(255,210,70,0.16) 0%, transparent 65%),
                radial-gradient(ellipse 35% 45% at 30% 80%, rgba(100,20,200,0.22) 0%, transparent 65%);
            animation: auraShift 7s ease-in-out infinite alternate;
        }

        @keyframes auraShift {
            0%   { opacity: 0.65; transform: scale(1);    }
            50%  { opacity: 1.00; transform: scale(1.04); }
            100% { opacity: 0.65; transform: scale(1);    }
        }

        /* ── Sparkle canvas sits above overlay ── */
        #sparkle-canvas {
            position: fixed; inset: 0;
            width: 100%; height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        /* ── Center everything ── */
        .page-center {
            position: fixed; inset: 0;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }

        /* ── Login card — futuristic panel ── */
        .login-card {
            width: 100%;
            max-width: 440px;
            background: linear-gradient(
                148deg,
                rgba(8, 2, 28, 0.94)  0%,
                rgba(20, 4, 55, 0.97) 50%,
                rgba(8, 2, 28, 0.94) 100%
            );
            border: 1px solid rgba(201, 168, 76, 0.30);
            border-radius: 20px;
            padding: 36px 38px 32px;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(20px) saturate(1.5);
            -webkit-backdrop-filter: blur(20px) saturate(1.5);
            box-shadow:
                0 0 0 1px rgba(138, 79, 255, 0.15),
                0 12px 60px rgba(0, 0, 0, 0.7),
                0 0 90px rgba(80, 20, 180, 0.28),
                0 0 160px rgba(201, 168, 76, 0.08),
                inset 0 1px 0 rgba(255, 215, 100, 0.12),
                inset 0 -1px 0 rgba(138, 79, 255, 0.12);
            animation: cardIn 0.85s cubic-bezier(.22,1,.36,1) both;
        }

        /* scan-line shimmer across card */
        .login-card .scan-line {
            position: absolute;
            top: -100%; left: 0;
            width: 100%; height: 55%;
            background: linear-gradient(transparent, rgba(138,79,255,0.04), rgba(201,168,76,0.03), transparent);
            animation: scanDown 6s linear infinite;
            pointer-events: none;
            z-index: 0;
        }

        @keyframes scanDown {
            0%   { top: -60%; }
            100% { top: 110%; }
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(28px) scale(0.97); }
            to   { opacity: 1; transform: translateY(0)    scale(1);    }
        }

        /* ── Gold shimmer top bar ── */
        .login-card::before {
            content: '';
            position: absolute;
            top: 0; left: 8%; right: 8%;
            height: 2px;
            background: linear-gradient(90deg,
                transparent,
                rgba(201,168,76,0.6) 20%,
                #f5e070 50%,
                rgba(201,168,76,0.6) 80%,
                transparent
            );
            box-shadow: 0 0 18px rgba(245,224,112,0.65), 0 0 35px rgba(201,168,76,0.3);
        }

        /* ── Purple glow bottom bar ── */
        .login-card::after {
            content: '';
            position: absolute;
            bottom: 0; left: 12%; right: 12%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(138,79,255,0.75), transparent);
            box-shadow: 0 0 14px rgba(138,79,255,0.55);
        }

        /* ── Corner ornaments ── */
        .corner {
            position: absolute;
            width: 20px; height: 20px;
            border-color: rgba(201,168,76,0.5);
            border-style: solid;
        }
        .c-tl { top: 13px; left: 13px;   border-width: 2px 0 0 2px; border-radius: 4px 0 0 0; }
        .c-tr { top: 13px; right: 13px;  border-width: 2px 2px 0 0; border-radius: 0 4px 0 0; }
        .c-bl { bottom: 13px; left: 13px;  border-width: 0 0 2px 2px; border-radius: 0 0 0 4px; }
        .c-br { bottom: 13px; right: 13px; border-width: 0 2px 2px 0; border-radius: 0 0 4px 0; }

        /* ── Branding block ── */
        .brand-section {
            text-align: center;
            margin-bottom: 24px;
        }

        /* ── Logo wrapper ── */
        .logo-wrap {
            position: relative;
            display: inline-block;
            width: 220px; height: 130px;
            margin-bottom: 18px;
            border-radius: 12px;
            border: 2px solid #c9a84c;
            animation: logoGlow 2.8s ease-in-out infinite alternate;
        }

        @keyframes logoGlow {
            0%   { box-shadow: 0 0 10px rgba(201,168,76,0.45), 0 0 30px rgba(138,79,255,0.25); }
            100% { box-shadow: 0 0 22px rgba(201,168,76,0.85), 0 0 55px rgba(138,79,255,0.55); }
        }

        .logo-wrap .logo-img {
            width: calc(100% - 16px);
            height: calc(100% - 16px);
            margin: 8px;
            object-fit: cover;
            object-position: center top;
            border-radius: 6px;
            display: block;
        }

        .brand-title {
            font-family: 'Cinzel', serif;
            font-size: 1.22rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            line-height: 1.25;
            background: linear-gradient(120deg, #c9a84c 0%, #f5e070 35%, #ffffff 50%, #bf7fff 65%, #c9a84c 100%);
            background-size: 250% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: titleShimmer 4s linear infinite;
        }

        @keyframes titleShimmer {
            0%   { background-position: 0%   center; }
            100% { background-position: 250% center; }
        }

        .brand-tagline {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 0.82rem;
            font-weight: 300;
            color: rgba(180, 145, 255, 0.6);
            letter-spacing: 0.12em;
            margin-top: 5px;
        }

        /* ── Gold + gem divider ── */
        .divider {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 26px;
        }
        .divider-line {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(201,168,76,0.42), transparent);
        }
        .divider-gem {
            width: 5px; height: 5px;
            background: #c9a84c;
            transform: rotate(45deg);
            box-shadow: 0 0 8px rgba(201,168,76,0.9), 0 0 16px rgba(201,168,76,0.4);
            flex-shrink: 0;
        }
        .divider-label {
            font-size: 0.57rem;
            letter-spacing: 0.4em;
            text-transform: uppercase;
            color: rgba(201,168,76,0.48);
        }

        /* ── Form fields — futuristic ── */
        .field-group { margin-bottom: 15px; }

        .field-label {
            display: flex;
            align-items: center;
            gap: 7px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: rgba(201,168,76,0.75);
            margin-bottom: 7px;
        }

        .field-label i { color: rgba(138,79,255,0.9); font-size: 0.82rem; }

        .field-wrap { position: relative; }

        .field-input {
            width: 100%;
            background: rgba(20, 5, 50, 0.55);
            border: 1px solid rgba(138,79,255,0.22);
            border-bottom: 1px solid rgba(201,168,76,0.30);
            border-radius: 8px;
            color: #f0eadc;
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.98rem;
            font-weight: 400;
            padding: 12px 44px 12px 15px;
            outline: none;
            transition: border-color 0.25s, background 0.25s, box-shadow 0.25s;
            letter-spacing: 0.04em;
            caret-color: #f5e070;
        }

        .field-input::placeholder { color: rgba(255,255,255,0.18); }

        .field-input:focus {
            background: rgba(40, 8, 90, 0.60);
            border-color: rgba(201,168,76,0.65);
            border-bottom-color: #f5e070;
            box-shadow:
                0 0 0 3px rgba(201,168,76,0.08),
                0 2px 20px rgba(120,60,220,0.22),
                inset 0 1px 0 rgba(201,168,76,0.06);
        }

        .field-input.is-invalid {
            border-color: rgba(255,70,120,0.7);
            box-shadow: 0 0 0 3px rgba(255,70,120,0.08);
        }

        .field-eye {
            position: absolute;
            right: 13px; top: 50%;
            transform: translateY(-50%);
            color: rgba(138,79,255,0.5);
            font-size: 1rem;
            cursor: pointer;
            background: none; border: none; padding: 2px;
            transition: color 0.2s;
        }
        .field-eye:hover { color: rgba(201,168,76,0.85); }

        .invalid-msg {
            color: #ff7099;
            font-size: 0.77rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* ── Sign-in button — futuristic ── */
        .btn-signin {
            width: 100%;
            margin-top: 22px;
            padding: 14px 20px;
            border-radius: 8px;
            border: 0;
            background: linear-gradient(90deg,
                #3a0080 0%,
                #6b1cc8 30%,
                #9b3fff 55%,
                #c9a84c 80%,
                #f5e070 100%
            );
            background-size: 220% auto;
            color: #fff;
            font-family: 'Cinzel', serif;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: background-position 0.6s ease, box-shadow 0.3s, transform 0.2s;
            box-shadow:
                0 0 0 1px rgba(201,168,76,0.35),
                0 4px 28px rgba(100,30,200,0.6),
                0 0 60px rgba(201,168,76,0.12);
        }

        /* top gloss sheen */
        .btn-signin::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 50%;
            background: linear-gradient(to bottom, rgba(255,255,255,0.10), transparent);
            border-radius: 8px 8px 0 0;
            pointer-events: none;
        }

        /* sweep shimmer on hover */
        .btn-signin::after {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 60%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.18), transparent);
            transition: left 0.55s ease;
            pointer-events: none;
        }

        .btn-signin:hover {
            background-position: right center;
            box-shadow:
                0 0 0 1px rgba(201,168,76,0.70),
                0 6px 36px rgba(100,30,200,0.75),
                0 0 80px rgba(201,168,76,0.30);
            transform: translateY(-2px);
        }

        .btn-signin:hover::after { left: 140%; }
        .btn-signin:active { transform: translateY(0); }

        /* ── Card footer ── */
        .card-footer {
            margin-top: 20px;
            text-align: center;
        }

        .footer-badge {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            font-size: 0.62rem;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.16);
        }

        .footer-badge::before,
        .footer-badge::after {
            content: '✦';
            font-size: 0.48rem;
            color: rgba(201,168,76,0.35);
        }

        /* ── Bottom page tag ── */
        .page-footer {
            position: fixed;
            bottom: 16px; left: 0; right: 0;
            text-align: center;
            z-index: 3;
            pointer-events: none;
        }

        .page-footer span {
            font-size: 0.6rem;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: rgba(201,168,76,0.25);
        }

        /* ── Responsive ── */
        @media (max-height: 700px) {
            .login-card { padding: 22px 28px 20px; }
            .logo-wrap  { width: 165px; height: 95px; margin-bottom: 10px; }
            .brand-section { margin-bottom: 14px; }
        }

        @media (max-width: 480px) {
            .login-card { padding: 28px 20px 24px; }
            .logo-wrap  { width: 180px; height: 108px; }
        }
    </style>
</head>
<body>

    {{-- Color aura layer --}}
    <div class="color-aura"></div>

    {{-- Sparkle canvas --}}
    <canvas id="sparkle-canvas"></canvas>

    {{-- Centered login card --}}
    <div class="page-center">
        <div class="login-card">
            <div class="corner c-tl"></div>
            <div class="corner c-tr"></div>
            <div class="corner c-bl"></div>
            <div class="corner c-br"></div>
            <div class="scan-line"></div>

            {{-- Branding --}}
            <div class="brand-section">
                <div class="logo-wrap">
                    <img class="logo-img" src="{{ asset('images/KS.png') }}" alt="Surogon 2026">
                </div>
                <div class="brand-title">Surogon Pageant 2026</div>
                <div class="brand-tagline">Women of Limitless Potential</div>
            </div>

            {{-- Divider --}}
            <div class="divider">
                <div class="divider-line"></div>
                <div class="divider-gem"></div>
                <span class="divider-label">Access Portal</span>
                <div class="divider-gem"></div>
                <div class="divider-line"></div>
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                <div class="field-group">
                    <label for="email" class="field-label">
                        <i class="bi bi-envelope-fill"></i>Email Address
                    </label>
                    <div class="field-wrap">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="enter your email"
                            autocomplete="email"
                            autofocus
                            required
                            class="field-input @error('email') is-invalid @enderror"
                        >
                    </div>
                    @error('email')
                        <div class="invalid-msg"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="field-group">
                    <label for="password" class="field-label">
                        <i class="bi bi-shield-lock-fill"></i>Password
                    </label>
                    <div class="field-wrap">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="enter your password"
                            autocomplete="current-password"
                            required
                            class="field-input @error('password') is-invalid @enderror"
                        >
                        <button type="button" class="field-eye" onclick="togglePwd(this)" tabindex="-1">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="invalid-msg"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-signin">✦ &nbsp;Sign In&nbsp; ✦</button>
            </form>

            <div class="card-footer">
                <span class="footer-badge">Authorized Personnel Only</span>
            </div>
        </div>
    </div>

    <div class="page-footer">
        <span>Surogon Pageant 2026 &nbsp;·&nbsp; Official Judging System</span>
    </div>

    <script>
    /* ── Sparkle / glitter particle engine ── */
    (function () {
        const canvas = document.getElementById('sparkle-canvas');
        const ctx    = canvas.getContext('2d');
        let W, H;

        const GOLD   = ['#f5e070','#c9a84c','#ffe066','#ffd700','#e8c84a'];
        const PURPLE = ['#bf7fff','#9b59ff','#cc88ff','#8a4fff','#a066ff'];
        // gold-weighted palette
        const PALETTE = [...GOLD, ...GOLD, ...GOLD, ...PURPLE, ...PURPLE];

        function resize() {
            W = canvas.width  = window.innerWidth;
            H = canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resize);
        resize();

        class Spark {
            constructor(born) { this.init(born); }

            init(born) {
                // Always spawn at a fully random position across the entire screen
                this.x   = Math.random() * W;
                this.y   = Math.random() * H;
                // Slow drift in any direction (not just downward)
                const angle = Math.random() * Math.PI * 2;
                const speed = Math.random() * 0.05 + 0.01;
                this.vx  = Math.cos(angle) * speed;
                this.vy  = Math.sin(angle) * speed;
                this.r   = Math.random() * 1.8 + 0.4;
                this.a   = 0;
                this.maxA = Math.random() * 0.92 + 0.12;
                this.age  = 0;
                this.life = Math.random() * 400 + 250;
                this.col  = PALETTE[Math.floor(Math.random() * PALETTE.length)];
                this.tick = Math.random() * Math.PI * 2;
                this.tspd = Math.random() * 0.05 + 0.02;
                this.star = Math.random() < 0.32; // 32% rendered as 4-point star
            }

            drawStar(cx, cy, r) {
                ctx.save();
                ctx.globalAlpha = this.a * (0.75 + Math.sin(this.tick) * 0.25);
                ctx.strokeStyle = this.col;
                ctx.shadowColor = this.col;
                ctx.shadowBlur  = r * 6;
                ctx.lineCap = 'round';
                // long cross
                ctx.lineWidth = r * 0.65;
                ctx.beginPath();
                ctx.moveTo(cx - r*3, cy); ctx.lineTo(cx + r*3, cy);
                ctx.moveTo(cx, cy - r*3); ctx.lineTo(cx, cy + r*3);
                ctx.stroke();
                // short diagonal arms
                ctx.lineWidth = r * 0.38;
                ctx.beginPath();
                ctx.moveTo(cx - r*1.6, cy - r*1.6); ctx.lineTo(cx + r*1.6, cy + r*1.6);
                ctx.moveTo(cx + r*1.6, cy - r*1.6); ctx.lineTo(cx - r*1.6, cy + r*1.6);
                ctx.stroke();
                ctx.restore();
            }

            drawDot(cx, cy, r) {
                ctx.save();
                ctx.globalAlpha = this.a * (0.75 + Math.sin(this.tick) * 0.25);
                ctx.fillStyle   = this.col;
                ctx.shadowColor = this.col;
                ctx.shadowBlur  = r * 8;
                ctx.beginPath();
                ctx.arc(cx, cy, r, 0, Math.PI * 2);
                ctx.fill();
                ctx.restore();
            }

            update() {
                this.age++;
                this.x   += this.vx;
                this.y   += this.vy;
                this.tick += this.tspd;

                const p = this.age / this.life;
                if      (p < 0.18) this.a = (p / 0.18) * this.maxA;
                else if (p > 0.72) this.a = ((1 - p) / 0.28) * this.maxA;
                else               this.a = this.maxA;

                if (this.star) this.drawStar(this.x, this.y, this.r);
                else           this.drawDot(this.x, this.y, this.r);

                // Die only by age — respawn anywhere on screen
                return (this.age < this.life);
            }
        }

        // seed 160 particles
        const sparks = Array.from({ length: 160 }, (_, i) => new Spark(true));

        function frame() {
            ctx.clearRect(0, 0, W, H);
            for (let i = 0; i < sparks.length; i++) {
                if (!sparks[i].update()) sparks[i].init(false);
            }
            requestAnimationFrame(frame);
        }
        frame();
    })();

    /* ── Password show/hide ── */
    function togglePwd(btn) {
        const inp  = btn.previousElementSibling;
        const icon = btn.querySelector('i');
        if (inp.type === 'password') {
            inp.type = 'text';
            icon.className = 'bi bi-eye-slash';
        } else {
            inp.type = 'password';
            icon.className = 'bi bi-eye';
        }
    }
    </script>

</body>
</html>
