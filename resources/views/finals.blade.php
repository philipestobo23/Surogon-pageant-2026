@extends('layouts.app')

@section('content')

<div class="fn-page">

    {{-- ── Royal Stage Background ── --}}
    <div class="fn-bg-aura" aria-hidden="true">
        {{-- Stage floor glow --}}
        <div class="fn-bg-floor-glow"></div>
        {{-- Overhead spotlights --}}
        <div class="fn-bg-spot fn-bg-spot-l"></div>
        <div class="fn-bg-spot fn-bg-spot-r"></div>
        <div class="fn-bg-spot fn-bg-spot-c"></div>
        {{-- Gold edge veils --}}
        <div class="fn-bg-veil-l"></div>
        <div class="fn-bg-veil-r"></div>
        {{-- Diamond sparkle field --}}
        <div class="fn-bg-diamonds">
            @for($d = 0; $d < 38; $d++)
                <span class="fn-bg-diamond" style="--d:{{ $d }}; --dx:{{ round(($d * 2.71 + 1.5) % 97, 1) }}%; --dy:{{ ($d * 137 + 11) % 93 }}%"></span>
            @endfor
        </div>
        {{-- Floating gold dust --}}
        <div class="fn-bg-dust">
            @for($u = 0; $u < 18; $u++)
                <span class="fn-bg-dust-p" style="--u:{{ $u }}"></span>
            @endfor
        </div>
    </div>

    {{-- ── Grand Final Crown Banner ── --}}
    <div class="fn-crown-banner">
        <div class="fn-curtain-left"></div>
        <div class="fn-curtain-right"></div>
        <div class="fn-rays"></div>
        <div class="fn-crown-glow-left"></div>
        <div class="fn-crown-glow-right"></div>
        <div class="fn-crown-particles">
            @for($i = 0; $i < 8; $i++)
                <span class="fn-particle" style="--i:{{ $i }}"></span>
            @endfor
        </div>
        <div class="fn-embers">
            @for($j = 0; $j < 16; $j++)
                <span class="fn-ember" style="--j:{{ $j }}"></span>
            @endfor
        </div>
        <div class="fn-crown-inner">
            <img src="{{ asset('images/surogon2026.png') }}" alt="Surogon 2026" class="fn-crown-icon">
            <div class="fn-crown-text">
                <h3 class="fn-crown-title">Grand Coronation Night · Final Placement</h3>
                <p class="fn-crown-sub">Binibining Surogon 2026</p>
            </div>
        </div>
    </div>

    {{-- ── Page Header ── --}}
    <div class="fn-header">
        <div class="fn-header-inner">
            <div class="fn-header-left">
                <div class="fn-icon-wrap">
                    <i class="bi bi-trophy-fill"></i>
                </div>
                <div>
                    <p class="fn-label">Final Round · Grand Coronation</p>
                    <h2 class="fn-title">Final Q &amp; A</h2>
                </div>
            </div>
            <div class="fn-header-right">
                <span class="fn-rate-badge"><i class="bi bi-star-fill me-1"></i>Rate: 1.0 – 10.0</span>
                <a href="{{ route('home') }}" class="fn-back-btn">
                    <i class="bi bi-arrow-left me-2"></i>Back
                </a>
            </div>
        </div>
        <div class="fn-reminder">
            <i class="bi bi-info-circle-fill"></i>
            Scores are <strong>not saved</strong> until you click <span class="fn-rem-submit"><i class="bi bi-floppy-fill me-1"></i>Submit Scores</span>
        </div>
    </div>

    {{-- ── Contestant Grid ── --}}
    @if(count($data) > 0)
    <form id="finals-form" hx-boost="false">
        @csrf
        <div class="fn-grid">
            @foreach($data as $key => $datum)
            <div class="fn-card" style="--card-i:{{ $loop->index }}">
                <div class="fn-card-ring"></div>
                <div class="fn-num-badge">{{ $datum[0] }}</div>
                <div class="fn-photo-wrap">
                    <img src="{{ asset('cons/' . $datum[0] . '.webp') }}"
                        alt="Contestant {{ $datum[0] }}"
                        class="fn-photo"
                        loading="lazy"
                        onerror="this.src='{{ asset('images/KS.png') }}'">
                    <div class="fn-photo-overlay"></div>
                    <div class="fn-finalist-crown"><i class="bi bi-gem"></i></div>
                    <div class="fn-top5-badge"><i class="bi bi-trophy-fill"></i> TOP 3</div>
                </div>
                <div class="fn-card-body">
                    <p class="fn-contestant-label">Contestant</p>
                    <p class="fn-contestant-name">{{ $datum[1] }}</p>
                    <div class="fn-score-wrap">
                        <label class="fn-score-label"><i class="bi bi-pen-fill me-1"></i>Score</label>
                        <input class="fn-score-input" type="number" step="0.1" min="1" max="10"
                                value="{{ $datum[2] }}" name="{{ $datum[3] }}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="fn-reminder fn-reminder-bottom">
            <i class="bi bi-info-circle-fill"></i>
            Scores are <strong>not saved</strong> until you click <span class="fn-rem-submit"><i class="bi bi-floppy-fill me-1"></i>Submit Scores</span>
        </div>

        <div class="floating-button">
            <button type="submit" class="fn-submit-btn">
                <span class="fn-submit-shimmer"></span>
                <i class="bi bi-floppy-fill me-2"></i>Submit Scores
            </button>
            <button hidden id="generate-rank" class="fn-generate-btn">
                <i class="bi bi-file-earmark-arrow-down-fill me-2"></i>Generate Rankings
            </button>
        </div>
    </form>
    @else
    {{-- ── Empty State (no Top 3 selected yet) ── --}}
    <div class="fn-empty-state">
        <div class="fn-empty-icon"><i class="bi bi-hourglass-split"></i></div>
        <h3 class="fn-empty-title">No Finalists Available</h3>
        <p class="fn-empty-desc">
            The Top 3 finalists have not been determined yet.<br>
            The Snap Talk round must be completed before Final Q&amp;A scoring can begin.
        </p>
        <a href="{{ route('home') }}" class="fn-empty-back">
            <i class="bi bi-house-fill me-2"></i>Back to Home
        </a>
    </div>
    @endif

    {{-- ── Ranking Table ── --}}
    <div id="rank-table-container" class="fn-rank-section" hidden>
        <div class="fn-rank-card">
            <div class="fn-rank-header"><i class="bi bi-trophy-fill me-2"></i>Final Q&amp;A Rankings</div>
            <p class="fn-rank-judge"><i class="bi bi-person-circle me-1"></i>{{ Auth::user()->RealName ?? Auth::user()->name }}</p>
            <div class="table-responsive">
                <table class="fn-table">
                    <thead><tr><th>Rank</th><th>No.</th><th>Contestant Name</th><th>Score</th></tr></thead>
                    <tbody id="rank-table"></tbody>
                </table>
            </div>
            <div class="fn-signature">
                <div class="fn-sig-line">{{ Auth::user()->name }} — {{ Auth::user()->RealName }}</div>
                <div class="fn-sig-desc">Judge's Signature</div>
            </div>
            <div class="fn-print-wrap" id="print-btn">
                <button class="fn-print-btn" type="button" onclick="printDiv()">
                    <i class="bi bi-printer-fill me-2"></i>Print Rankings
                </button>
                <a href="{{ route('home') }}" class="fn-home-btn">
                    <i class="bi bi-house-fill me-2"></i>Back to Home
                </a>
            </div>
        </div>
    </div>

</div>

<style>
:root {
    --fn-gold:          #f5c842;
    --fn-gold-light:    #ffe98a;
    --fn-gold-bright:   #fff4c2;
    --fn-gold-deep:     #c9960a;
    --fn-gold-dark:     #7a5c00;
    --fn-champagne:     #fdeec4;
    --fn-text:          #fff8e0;
    --fn-text-muted:    #c9aa55;
    --fn-radius:        18px;
    --fn-radius-btn:    14px;
    --fn-transition:    all 0.25s ease;
}

body {
    /* Royal velvet stage — deep crimson vignette over midnight navy */
    background:
        radial-gradient(ellipse 55% 45% at  0% 55%, rgba(110, 8,  35, 0.55) 0%, transparent 65%),
        radial-gradient(ellipse 55% 45% at 100% 45%, rgba(90,  6,  28, 0.50) 0%, transparent 65%),
        radial-gradient(ellipse 80% 35% at 50% 100%, rgba(160, 95,  0, 0.28) 0%, transparent 62%),
        radial-gradient(ellipse 40% 30% at 50%   0%, rgba(80,  15, 40, 0.32) 0%, transparent 60%),
        linear-gradient(170deg, #0a0010 0%, #160018 28%, #1a000f 55%, #0e0010 80%, #060008 100%) !important;
    background-attachment: fixed !important;
    min-height: 100vh;
}
#app, #main-content { background: transparent !important; }

/* ══════════════════════════════════════
   ROYAL STAGE BACKGROUND
══════════════════════════════════════ */
.fn-bg-aura {
    position: fixed; inset: 0; z-index: 0;
    pointer-events: none; overflow: hidden;
}

/* ─ Stage floor wash ─ */
.fn-bg-floor-glow {
    position: absolute; bottom: 0; left: 0; right: 0; height: 55vh;
    background:
        radial-gradient(ellipse 75% 100% at 50% 100%,
            rgba(215,162,0,0.30) 0%,
            rgba(165,108,0,0.14) 38%,
            transparent 70%);
    animation: stageFloorPulse 5s ease-in-out infinite;
}
@keyframes stageFloorPulse {
    0%,100% { opacity: 0.60; }
    50%     { opacity: 1.00; }
}

/* ─ Overhead spotlights ─ */
.fn-bg-spot {
    position: absolute; top: -5%;
    width: 60vw; height: 100vh;
    border-radius: 50%;
    mix-blend-mode: screen;
    animation: spotFade 8s ease-in-out infinite alternate;
}
.fn-bg-spot-l {
    left: -20vw;
    background: conic-gradient(
        from 96deg at 25% 0%,
        transparent 0deg,
        rgba(220,175,20,0.12) 8deg,
        rgba(240,200,30,0.20) 12deg,
        rgba(220,175,20,0.12) 16deg,
        transparent 24deg 360deg
    );
    animation-duration: 9s;
}
.fn-bg-spot-r {
    right: -20vw; left: auto;
    background: conic-gradient(
        from 264deg at 75% 0%,
        transparent 0deg,
        rgba(200,155,15,0.12) 8deg,
        rgba(225,185,25,0.20) 12deg,
        rgba(200,155,15,0.12) 16deg,
        transparent 24deg 360deg
    );
    animation-duration: 11s;
    animation-delay: 1.5s;
}
.fn-bg-spot-c {
    left: 50%; transform: translateX(-50%);
    width: 55vw; height: 95vh;
    background: conic-gradient(
        from 178deg at 50% 0%,
        transparent 0deg,
        rgba(255,220,80,0.07) 5deg,
        rgba(255,238,120,0.12) 9deg,
        rgba(255,220,80,0.07) 13deg,
        transparent 20deg 360deg
    );
    animation-duration: 7s;
    animation-delay: 3s;
}
@keyframes spotFade {
    0%   { opacity: 0.55; }
    50%  { opacity: 1.00; }
    100% { opacity: 0.70; }
}

/* ─ Side gold veils ─ */
.fn-bg-veil-l,
.fn-bg-veil-r {
    position: absolute; top: 0; bottom: 0; width: 14%;
    animation: veilBreath 12s ease-in-out infinite alternate;
}
.fn-bg-veil-l {
    left: 0;
    background: linear-gradient(to right,
        rgba(200,148,0,0.38) 0%,
        rgba(225,175,10,0.16) 42%,
        transparent 100%);
    animation-delay: 0s;
}
.fn-bg-veil-r {
    right: 0;
    background: linear-gradient(to left,
        rgba(200,148,0,0.38) 0%,
        rgba(225,175,10,0.16) 42%,
        transparent 100%);
    animation-delay: 2s;
}
@keyframes veilBreath {
    0%   { opacity: 0.55; }
    100% { opacity: 1.00; }
}

/* ─ Diamond sparkle field ─ */
.fn-bg-diamonds { position: absolute; inset: 0; overflow: hidden; }
.fn-bg-diamond {
    position: absolute;
    left: var(--dx);
    top:  var(--dy);
    width:  4px;
    height: 4px;
    /* 4-point star / diamond  */
    clip-path: polygon(50% 0%, 55% 42%, 100% 50%, 55% 58%, 50% 100%, 45% 58%, 0% 50%, 45% 42%);
    background: #fff;
    transform-origin: center;
    animation: diamondTwinkle calc(1.8s + var(--d) * 0.14s) ease-in-out calc(var(--d) * 0.19s) infinite;
}
/* Size & color variety */
.fn-bg-diamond:nth-child(3n)  { width: 6px;  height: 6px;  background: #ffe880; }
.fn-bg-diamond:nth-child(5n)  { width: 3px;  height: 3px;  background: #fff5cc; }
.fn-bg-diamond:nth-child(7n)  { width: 8px;  height: 8px;  background: #ffd700; }
.fn-bg-diamond:nth-child(9n)  { width: 10px; height: 10px; background: #fffae0; }
.fn-bg-diamond:nth-child(11n) { width: 5px;  height: 5px;  background: #ffb3d1; } /* rose diamond */
@keyframes diamondTwinkle {
    0%,100% {
        opacity: 0.05;
        transform: scale(0.4) rotate(0deg);
        filter: blur(0.5px);
    }
    20% {
        opacity: 1.00;
        transform: scale(1.8) rotate(22deg);
        filter: blur(0px);
        box-shadow: 0 0 8px 3px rgba(255,230,100,0.90);
    }
    45% {
        opacity: 0.20;
        transform: scale(0.6) rotate(45deg);
    }
    65% {
        opacity: 0.85;
        transform: scale(1.5) rotate(20deg);
        filter: blur(0px);
        box-shadow: 0 0 10px 4px rgba(255,215,50,0.80);
    }
    85% {
        opacity: 0.10;
        transform: scale(0.35) rotate(68deg);
    }
}

/* ─ Floating gold dust ─ */
.fn-bg-dust { position: absolute; inset: 0; overflow: hidden; }
.fn-bg-dust-p {
    position: absolute;
    bottom: -4px;
    left: calc(2% + var(--u) * 5.6%);
    width:  2px;
    height: 2px;
    border-radius: 50%;
    background: radial-gradient(circle, #fffde0 0%, #ffd700 55%, #ffaa00 100%);
    box-shadow: 0 0 5px rgba(255,210,0,0.95), 0 0 12px rgba(255,160,0,0.35);
    opacity: 0;
    animation: dustFloat calc(5s + var(--u) * 0.38s) ease-out calc(var(--u) * 0.22s) infinite;
}
.fn-bg-dust-p:nth-child(even) { width: 3px; height: 3px; background: rgba(255,200,160,0.9); }
@keyframes dustFloat {
    0%   { opacity: 0;   transform: translateY(0)    translateX(0px)  scale(1.0); }
    12%  { opacity: 0.9; }
    38%  { opacity: 0.6; transform: translateY(-20vh) translateX(10px) scale(0.8); }
    68%  { opacity: 0.2; transform: translateY(-50vh) translateX(-7px) scale(0.4); }
    100% { opacity: 0;   transform: translateY(-85vh) translateX(4px)  scale(0.1); }
}

/* ── Page wrapper ── */
.fn-page {
    position: relative;
    z-index: 1;
    min-height: calc(100vh - 70px);
    padding: 24px 20px 110px;
    max-width: 1280px;
    margin: 0 auto;
}

/* ══════════════════════════════════════
   GRAND FINAL CROWN BANNER
══════════════════════════════════════ */
.fn-crown-banner {
    position: relative; overflow: hidden;
    border-radius: var(--fn-radius);
    background: linear-gradient(160deg, rgba(90,65,0,0.45) 0%, rgba(30,20,0,0.70) 60%, rgba(60,40,0,0.50) 100%);
    border: 1px solid rgba(220, 175, 20, 0.38);
    border-top: 3px solid rgba(245, 200, 40, 0.80);
    padding: 18px 24px;
    margin-bottom: 18px;
}

/* compact banner on landscape phones */
@media (max-height: 500px) and (orientation: landscape) {
    .fn-crown-banner { padding: 10px 16px; margin-bottom: 8px; }
    .fn-crown-icon   { width: 44px !important; height: 44px !important; }
    .fn-crown-title  { font-size: 1.5rem !important; }
    .fn-crown-label, .fn-crown-sub { display: none; }
}

/* sweeping gold shimmer across the whole banner */
.fn-crown-banner::before {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(105deg,
        transparent 30%,
        rgba(255, 230, 100, 0.09) 45%,
        rgba(255, 245, 160, 0.16) 50%,
        rgba(255, 230, 100, 0.09) 55%,
        transparent 70%);
    background-size: 200% 100%;
    animation: bannerShimmer 3.5s ease-in-out infinite;
    pointer-events: none; z-index: 1;
}
@keyframes bannerShimmer {
    0%   { background-position: -100% 0; }
    100% { background-position: 200%  0; }
}

/* ── Golden Curtains ── */
.fn-curtain-left,
.fn-curtain-right {
    position: absolute; top: 0; bottom: 0;
    width: 34%; z-index: 1; pointer-events: none;
}
.fn-curtain-left {
    left: 0;
    background:
        repeating-linear-gradient(180deg,
            rgba(200,150,0,0.02) 0%,  rgba(245,190,0,0.13) 10%,
            rgba(180,130,0,0.02) 20%, rgba(245,190,0,0.11) 30%,
            rgba(180,130,0,0.02) 40%),
        linear-gradient(to right,
            rgba(215,162,0,0.38) 0%, rgba(245,195,20,0.16) 52%, transparent 100%);
    clip-path: polygon(0 0, 100% 0, 86% 16%, 95% 34%, 83% 52%, 93% 70%, 82% 88%, 92% 100%, 0 100%);
    animation: curtainSwayL 8s ease-in-out infinite;
    transform-origin: top left;
}
.fn-curtain-right {
    right: 0;
    background:
        repeating-linear-gradient(180deg,
            rgba(200,150,0,0.02) 0%,  rgba(245,190,0,0.13) 10%,
            rgba(180,130,0,0.02) 20%, rgba(245,190,0,0.11) 30%,
            rgba(180,130,0,0.02) 40%),
        linear-gradient(to left,
            rgba(215,162,0,0.38) 0%, rgba(245,195,20,0.16) 52%, transparent 100%);
    clip-path: polygon(14% 0, 100% 0, 100% 100%, 8% 100%, 18% 88%, 7% 70%, 17% 52%, 5% 34%, 14% 16%);
    animation: curtainSwayR 8s ease-in-out infinite;
    transform-origin: top right;
}
@keyframes curtainSwayL {
    0%,100% { transform: scaleX(1)    skewY(-0.4deg); }
    50%     { transform: scaleX(1.06) skewY(0.9deg);  }
}
@keyframes curtainSwayR {
    0%,100% { transform: scaleX(1)    skewY(0.4deg);  }
    50%     { transform: scaleX(1.06) skewY(-0.9deg); }
}

/* ── God Rays ── */
.fn-rays {
    position: absolute; inset: 0; z-index: 1;
    pointer-events: none;
    background: conic-gradient(
        from 250deg at 50% 115%,
        transparent 0deg,
        rgba(255,232,80,0.07) 5deg,   transparent 11deg,
        rgba(255,212,40,0.05) 15deg,  transparent 20deg,
        rgba(255,232,80,0.08) 24deg,  transparent 30deg,
        rgba(255,212,40,0.04) 34deg,  transparent 39deg,
        rgba(255,232,80,0.06) 43deg,  transparent 48deg,
        rgba(255,212,40,0.05) 52deg,  transparent 57deg,
        rgba(255,232,80,0.07) 61deg,  transparent 66deg,
        transparent 66deg 360deg
    );
    animation: raysWave 14s ease-in-out infinite alternate;
}
@keyframes raysWave {
    from { opacity: 0.55; transform: rotate(-5deg) scaleY(1);    }
    to   { opacity: 1;    transform: rotate(5deg)  scaleY(1.04); }
}

/* ── Ember Sparks ── */
.fn-embers { position: absolute; inset: 0; pointer-events: none; z-index: 2; overflow: hidden; }
.fn-ember {
    position: absolute;
    bottom: 0;
    left: calc(1% + var(--j) * 6.5%);
    width: 3px; height: 3px;
    border-radius: 50%;
    background: radial-gradient(circle, #fff8b0 0%, #ffaa00 55%, #ff4400 100%);
    box-shadow: 0 0 5px rgba(255,155,0,0.95), 0 0 12px rgba(255,80,0,0.45);
    opacity: 0;
    animation: emberUp calc(2.5s + var(--j) * 0.27s) ease-out calc(var(--j) * 0.18s) infinite;
}
@keyframes emberUp {
    0%   { opacity: 0;   transform: translateY(0)      scale(1.3); }
    10%  { opacity: 1; }
    40%  { opacity: 0.8; transform: translateY(-38px)   scale(0.85); }
    70%  { opacity: 0.3; transform: translateY(-82px)   scale(0.45); }
    100% { opacity: 0;   transform: translateY(-135px)  scale(0.08); }
}

/* left/right ambient glows */
.fn-crown-glow-left {
    position: absolute; left: -80px; top: -60px;
    width: 380px; height: 280px; border-radius: 50%;
    background: radial-gradient(circle, rgba(200,155,0,0.28) 0%, transparent 70%);
    filter: blur(60px); pointer-events: none; z-index: 0;
    animation: glowPulse 6s ease-in-out infinite;
}
.fn-crown-glow-right {
    position: absolute; right: -60px; bottom: -40px;
    width: 300px; height: 220px; border-radius: 50%;
    background: radial-gradient(circle, rgba(255,200,0,0.20) 0%, transparent 70%);
    filter: blur(55px); pointer-events: none; z-index: 0;
    animation: glowPulse 8s ease-in-out 2s infinite;
}
@keyframes glowPulse { 0%,100%{opacity:0.6; transform:scale(0.93);} 50%{opacity:1; transform:scale(1.08);} }

/* floating sparkle particles */
.fn-crown-particles { position: absolute; inset: 0; pointer-events: none; z-index: 1; overflow: hidden; }
.fn-particle {
    position: absolute;
    width: 3px; height: 3px; border-radius: 50%;
    background: var(--fn-gold-light);
    left: calc(var(--i) * 8.3%);
    bottom: -6px;
    animation: particleFloat calc(3s + var(--i) * 0.4s) ease-in calc(var(--i) * 0.25s) infinite;
    opacity: 0;
}
@keyframes particleFloat {
    0%   { opacity: 0;   transform: translateY(0)   scale(1)   rotate(0deg); }
    20%  { opacity: 0.9; }
    80%  { opacity: 0.6; }
    100% { opacity: 0;   transform: translateY(-120px) scale(0.4) rotate(180deg); }
}

/* inner layout — horizontal: image left, text right */
.fn-crown-inner {
    position: relative; z-index: 2;
    display: flex; align-items: center; gap: 20px;
}

.fn-crown-icon {
    width: 120px; height: 120px;
    flex-shrink: 0;
    object-fit: contain;
    filter:
        drop-shadow(0 0 14px rgba(245,200,40,0.90))
        drop-shadow(0 0 30px rgba(200,150,0,0.60));
    animation: crownFloat 3s ease-in-out infinite;
}
@keyframes crownFloat { 0%,100%{transform:translateY(0) scale(1);} 50%{transform:translateY(-5px) scale(1.04);} }

.fn-crown-text {
    display: flex; flex-direction: column; gap: 2px;
}

.fn-crown-label {
    font-size: 0.63rem; letter-spacing: 0.22em;
    text-transform: uppercase; color: var(--fn-text-muted); margin: 0;
    font-family: 'Rajdhani', sans-serif;
}
.fn-crown-title {
    font-family: 'Orbitron', sans-serif;
    font-size: clamp(1.8rem, 3vw, 2.2rem); font-weight: 700;
    background: linear-gradient(90deg,
        var(--fn-gold-bright), var(--fn-gold-light), var(--fn-gold),
        var(--fn-gold-deep), var(--fn-gold), var(--fn-gold-light), var(--fn-gold-bright));
    background-size: 250% auto;
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    animation: titleGoldShine 3.5s linear infinite;
    margin: 0; line-height: 1.1; letter-spacing: 0.06em;
}
@keyframes titleGoldShine { 0%{background-position:0% center;} 100%{background-position:250% center;} }
.fn-crown-sub {
    font-family: 'Rajdhani', sans-serif; font-size: 1.4rem;
    letter-spacing: 0.18em; text-transform: uppercase;
    color: rgba(253, 209, 51, 0.65); margin: 0;
}

/* ── Header ── */
.fn-header {
    background: rgba(60, 45, 0, 0.25);
    border: 1px solid rgba(200, 160, 20, 0.30);
    border-top: 3px solid rgba(220, 175, 20, 0.65);
    border-radius: var(--fn-radius);
    padding: 18px 24px 14px;
    margin-bottom: 24px;
}
.fn-header-inner {
    display: flex; align-items: center;
    justify-content: space-between;
    flex-wrap: wrap; gap: 10px; margin-bottom: 12px;
}
.fn-header-left  { display: flex; align-items: center; gap: 14px; flex: 1; min-width: 0; }
.fn-icon-wrap {
    width: 50px; height: 50px; border-radius: 14px;
    background: rgba(150, 110, 0, 0.28);
    border: 1px solid rgba(210, 170, 20, 0.45);
    display: grid; place-items: center;
    font-size: 1.5rem; color: var(--fn-gold); flex-shrink: 0;
    box-shadow: 0 0 18px rgba(200,155,0,0.30);
}
.fn-label {
    font-size: 0.67rem; letter-spacing: 0.22em;
    text-transform: uppercase; color: var(--fn-text-muted); margin: 0 0 3px;
}
.fn-title {
    font-family: 'Orbitron', sans-serif;
    font-size: clamp(1rem, 3vw, 1.5rem); font-weight: 700;
    background: linear-gradient(90deg, var(--fn-gold-light), var(--fn-gold), var(--fn-gold-deep));
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    margin: 0;
}
.fn-header-right { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
.fn-rate-badge {
    padding: 5px 14px; border-radius: 50px;
    background: rgba(140, 105, 0, 0.22);
    border: 1px solid rgba(210, 170, 20, 0.38);
    font-size: 0.75rem; color: var(--fn-gold);
    font-family: 'Rajdhani', sans-serif; font-weight: 600;
}
.fn-back-btn {
    display: flex; align-items: center; padding: 7px 16px;
    border-radius: var(--fn-radius-btn);
    background: rgba(160, 115, 0, 0.20);
    border: 1px solid rgba(210, 170, 20, 0.40);
    color: var(--fn-gold-light); font-family: 'Rajdhani', sans-serif;
    font-size: 0.88rem; font-weight: 600;
    text-decoration: none; transition: var(--fn-transition);
}
.fn-back-btn:hover {
    background: rgba(180, 135, 0, 0.30); color: var(--fn-gold-bright);
    border-color: rgba(240, 195, 30, 0.60); text-decoration: none;
}
.fn-reminder {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.79rem; color: var(--fn-text-muted);
    background: rgba(50, 38, 0, 0.25);
    border: 1px solid rgba(120, 90, 0, 0.28);
    border-radius: 9px; padding: 7px 13px;
}
.fn-reminder i     { color: var(--fn-gold); flex-shrink: 0; }
.fn-reminder strong { color: #ffcc66; }
.fn-rem-submit     { color: var(--fn-gold-light); font-weight: 600; }
.fn-reminder-bottom { margin: 0 0 22px; }

/* ── Grid ── */
.fn-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px; margin-bottom: 24px;
}
/* portrait progressions */
@media(min-width:480px)  { .fn-grid{ grid-template-columns:repeat(3,1fr); gap:14px; } }
@media(min-width:768px)  { .fn-grid{ grid-template-columns:repeat(3,1fr); gap:16px; } }
@media(min-width:1024px) { .fn-grid{ grid-template-columns:repeat(3,1fr); gap:18px; } }
/* landscape phone — all 3 side-by-side with tighter gaps */
@media(max-height:500px) and (orientation:landscape) {
    .fn-grid{ grid-template-columns:repeat(3,1fr); gap:8px; }
    .fn-card-body{ padding:6px 8px 10px; }
    .fn-contestant-name{ font-size:0.78rem; }
    .fn-score-input{ font-size:0.95rem; padding:5px 6px; }
}
/* landscape tablet */
@media(min-width:768px) and (orientation:landscape) and (max-width:1023px) {
    .fn-grid{ grid-template-columns:repeat(3,1fr); gap:12px; }
}

/* ── Cards ── */
.fn-card {
    position: relative; border-radius: var(--fn-radius);
    background: rgba(22, 16, 0, 0.88);
    border: 1px solid rgba(180, 135, 0, 0.28);
    overflow: hidden; display: flex; flex-direction: column;
    transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
}
/* per-card staggered entrance */
.fn-card { animation: cardIn 0.4s ease both; animation-delay: calc(var(--card-i, 0) * 0.07s); }
@keyframes cardIn { from{opacity:0; transform:translateY(18px);} to{opacity:1; transform:translateY(0);} }

.fn-card:hover {
    transform: translateY(-7px);
    border-color: rgba(240, 195, 30, 0.65);
    box-shadow: 0 12px 40px rgba(180,135,0,0.30), 0 0 0 1px rgba(240,195,30,0.18);
}
/* shimmer sweep on hover */
.fn-card::after {
    content: '';
    position: absolute; inset: 0; z-index: 4;
    background: linear-gradient(105deg, transparent 35%, rgba(255,235,120,0.10) 50%, transparent 65%);
    opacity: 0; transition: opacity 0.3s;
    pointer-events: none;
}
.fn-card:hover::after { opacity: 1; }

/* outer glow ring */
.fn-card-ring {
    position: absolute; inset: -1px; border-radius: var(--fn-radius);
    border: 1px solid transparent;
    background: linear-gradient(135deg, rgba(240,195,30,0.35), transparent 50%, rgba(240,195,30,0.18)) border-box;
    -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: destination-out; mask-composite: exclude;
    pointer-events: none; z-index: 5; opacity: 0; transition: opacity 0.25s;
}
.fn-card:hover .fn-card-ring { opacity: 1; }

.fn-num-badge {
    position: absolute; top: 8px; left: 8px; z-index: 6;
    width: 34px; height: 34px; border-radius: 50%;
    background: linear-gradient(135deg, #c9960a, #7a5c00);
    border: 2px solid rgba(245, 210, 60, 0.75);
    display: grid; place-items: center;
    font-family: 'Orbitron', sans-serif;
    font-size: 0.78rem; font-weight: 700; color: var(--fn-gold-bright);
    box-shadow: 0 0 14px rgba(200,155,0,0.50);
}
/* crown icon above photo */
.fn-finalist-crown {
    position: absolute; top: 8px; right: 8px; z-index: 5;
    font-size: 1.1rem; color: var(--fn-gold);
    filter: drop-shadow(0 0 8px rgba(240,195,30,0.90));
    animation: crownBob 2.8s ease-in-out infinite;
    line-height: 1;
}
@keyframes crownBob { 0%,100%{transform:translateY(0) scale(1);} 50%{transform:translateY(-3px) scale(1.1);} }

.fn-photo-wrap {
    position: relative; width: 100%;
    aspect-ratio: 3/4; overflow: hidden; background: #0e0a00;
}
.fn-photo {
    width: 100%; height: 100%; object-fit: cover; display: block;
    transition: transform 0.38s ease;
}
.fn-card:hover .fn-photo { transform: scale(1.07); }
.fn-photo-overlay {
    position: absolute; bottom: 0; left: 0; right: 0; height: 62%;
    background: linear-gradient(to top, rgba(10,7,0,0.97) 0%, transparent 100%);
    pointer-events: none;
}
.fn-top5-badge {
    position: absolute; bottom: 8px; right: 8px; z-index: 4;
    font-size: 0.58rem; font-weight: 700; letter-spacing: 0.12em;
    color: var(--fn-gold); font-family: 'Orbitron', sans-serif;
    background: rgba(8,5,0,0.80);
    border: 1px solid rgba(200,155,0,0.55);
    border-radius: 6px; padding: 3px 7px;
    filter: drop-shadow(0 0 6px rgba(200,155,0,0.65));
}
.fn-card-body {
    padding: 10px 12px 14px;
    display: flex; flex-direction: column; gap: 5px; flex: 1;
}
.fn-contestant-label {
    font-size: 0.60rem; letter-spacing: 0.18em;
    text-transform: uppercase; color: var(--fn-text-muted); margin: 0;
}
.fn-contestant-name {
    font-family: 'Rajdhani', sans-serif;
    font-weight: 600; font-size: 0.9rem;
    color: var(--fn-text); margin: 0 0 4px; line-height: 1.2;
}
.fn-score-wrap { margin-top: auto; }
.fn-score-label {
    display: flex; align-items: center;
    font-size: 0.68rem; color: var(--fn-gold);
    font-weight: 600; letter-spacing: 0.12em;
    text-transform: uppercase; margin-bottom: 4px;
}
/* hide native spinners */
.fn-score-input::-webkit-inner-spin-button,
.fn-score-input::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
.fn-stepper { display: flex; align-items: stretch; gap: 5px; }
.fn-score-input {
    flex: 1; min-width: 0;
    background: rgba(70, 50, 0, 0.28);
    border: 1px solid rgba(180, 135, 0, 0.50);
    border-radius: 9px; color: #fff;
    font-family: 'Orbitron', sans-serif;
    font-size: 1.15rem; font-weight: 700;
    text-align: center; padding: 7px 6px;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none; -moz-appearance: textfield;
}
.fn-score-input:focus {
    border-color: rgba(240, 195, 30, 0.88);
    box-shadow: 0 0 16px rgba(200,155,0,0.38); color: var(--fn-gold-light);
}
.fn-stepper-btns { display: flex; flex-direction: column; gap: 4px; flex-shrink: 0; }
.fn-step-btn {
    display: flex; align-items: center; justify-content: center;
    width: 28px; flex: 1;
    background: rgba(100,75,0,0.32);
    border: 1px solid rgba(200,155,0,0.48);
    border-radius: 7px; color: #f0c040;
    font-size: 0.70rem; cursor: pointer;
    transition: background 0.15s, color 0.15s, transform 0.12s, border-color 0.15s, box-shadow 0.15s;
    user-select: none; padding: 0; line-height: 1;
    touch-action: manipulation; -webkit-tap-highlight-color: transparent; outline: none;
}
.fn-stepper .fn-step-btn:hover {
    background: rgba(210,165,0,0.55) !important; color: #ffffff !important;
    border-color: rgba(245,200,30,0.85) !important;
    box-shadow: 0 0 10px rgba(220,175,0,0.50), inset 0 0 6px rgba(220,175,0,0.18) !important;
}
.fn-stepper .fn-step-btn:active {
    background: rgba(235,185,0,0.72) !important; color: #ffffff !important;
    border-color: rgba(255,220,0,0.95) !important;
    box-shadow: 0 0 16px rgba(235,185,0,0.70), inset 0 0 8px rgba(235,185,0,0.30) !important;
    transform: scale(0.88) !important;
}
.fn-stepper .fn-step-btn:focus-visible {
    outline: 2px solid rgba(245,200,30,0.85) !important; outline-offset: 2px;
}

/* ── Floating Buttons ── */
.floating-button {
    position: fixed; bottom: 24px; right: 24px;
    z-index: 1000; display: flex; gap: 10px;
    flex-direction: column; align-items: flex-end;
}
@media(max-height:500px) and (orientation:landscape) {
    .floating-button { bottom: 10px; right: 14px; }
    .fn-submit-btn   { padding: 10px 22px; font-size: 0.78rem; }
}
.fn-submit-btn {
    position: relative; display: flex; align-items: center;
    overflow: hidden; padding: 14px 32px; border-radius: 50px;
    background: linear-gradient(135deg, #c9960a 0%, #7a5c00 50%, #4d3a00 100%);
    border: none;
    outline: 2px solid rgba(240, 195, 30, 0.55); outline-offset: 3px;
    color: var(--fn-gold-bright); font-family: 'Orbitron', sans-serif;
    font-size: 0.88rem; font-weight: 700;
    letter-spacing: 0.10em; text-transform: uppercase;
    cursor: pointer;
    box-shadow: 0 6px 28px rgba(180,135,0,0.55), 0 0 0 1px rgba(220,175,20,0.20);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.fn-submit-shimmer {
    position: absolute; top: 0; left: -75%;
    width: 50%; height: 100%;
    background: linear-gradient(105deg, transparent 40%, rgba(255,245,160,0.38) 50%, transparent 60%);
    animation: fnShimmer 2.4s ease-in-out infinite;
    pointer-events: none;
}
@keyframes fnShimmer { 0%{left:-75%} 55%,100%{left:135%} }
.fn-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 40px rgba(200,155,0,0.68), 0 0 0 2px rgba(240,195,30,0.35);
}
.fn-submit-btn:active { transform: scale(0.97); }
.fn-generate-btn {
    display: flex; align-items: center; padding: 9px 18px; border-radius: 50px;
    background: linear-gradient(135deg, #2a1e00, #1c1400);
    border: 1px solid rgba(150, 110, 0, 0.44); color: var(--fn-gold);
    font-family: 'Rajdhani', sans-serif; font-size: 0.86rem; font-weight: 600;
    cursor: pointer; transition: var(--fn-transition);
}
.fn-generate-btn:hover { background: linear-gradient(135deg, #3a2a00, #2a1e00); }

/* ── Ranking Section ── */
.fn-rank-section { margin-top: 36px; padding-bottom: 40px; }
.table-responsive { overflow-x: auto; -webkit-overflow-scrolling: touch; }

/* small-screen table font */
@media(max-width:575px) {
    .fn-table th, .fn-table td { padding: 8px 10px; font-size: 0.82rem; }
    .fn-rank-header { font-size: 0.92rem; }
}
.fn-rank-card {
    background: rgba(14, 10, 0, 0.94);
    border: 1px solid rgba(180, 135, 0, 0.30);
    border-top: 3px solid rgba(220, 175, 20, 0.65);
    border-radius: var(--fn-radius); padding: 26px;
    position: relative; overflow: hidden;
}
.fn-rank-card::before {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(105deg, transparent 30%, rgba(255,235,100,0.04) 50%, transparent 70%);
    background-size: 200% 100%;
    animation: bannerShimmer 4s ease-in-out infinite;
    pointer-events: none;
}
.fn-rank-header {
    font-family: 'Orbitron', sans-serif; font-size: 1.05rem;
    font-weight: 700; color: var(--fn-gold); margin-bottom: 5px;
    position: relative; z-index: 1;
}
.fn-rank-judge {
    font-family: 'Rajdhani', sans-serif; font-size: 0.93rem;
    color: var(--fn-text-muted); margin-bottom: 18px;
    position: relative; z-index: 1;
}
.fn-table { width: 100%; border-collapse: collapse; font-family: 'Rajdhani', sans-serif; font-size: 0.93rem; position: relative; z-index: 1; }
.fn-table thead tr { background: rgba(90, 65, 0, 0.28); }
.fn-table th {
    padding: 11px 14px; text-align: center; color: var(--fn-gold);
    font-size: 0.76rem; letter-spacing: 0.13em; text-transform: uppercase;
    border-bottom: 1px solid rgba(180, 135, 0, 0.32);
}
.fn-table td {
    padding: 11px 14px; text-align: center;
    color: var(--fn-text); border-bottom: 1px solid rgba(70, 50, 0, 0.20);
}
.fn-table tbody tr:hover { background: rgba(90, 65, 0, 0.20); }
.fn-signature {
    display: flex; flex-direction: column; align-items: center;
    margin-top: 24px; gap: 5px; position: relative; z-index: 1;
}
.fn-sig-line {
    padding: 5px 28px;
    border-bottom: 2px solid rgba(210, 165, 20, 0.62);
    font-family: 'Orbitron', sans-serif; font-size: 0.82rem;
    color: var(--fn-text); letter-spacing: 0.08em;
}
.fn-sig-desc { font-size: 0.70rem; color: var(--fn-text-muted); letter-spacing: 0.14em; text-transform: uppercase; }
.fn-print-wrap { display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; margin-top: 20px; position: relative; z-index: 1; }
.fn-print-btn {
    display: flex; align-items: center; padding: 9px 26px; border-radius: 50px;
    background: rgba(120, 90, 0, 0.24);
    border: 1px solid rgba(200, 155, 0, 0.44); color: var(--fn-gold-light);
    font-family: 'Rajdhani', sans-serif; font-size: 0.93rem; font-weight: 600;
    cursor: pointer; transition: var(--fn-transition);
}
.fn-print-btn:hover { background: rgba(160, 120, 0, 0.34); }
.fn-home-btn {
    display: flex; align-items: center; padding: 9px 26px; border-radius: 50px;
    background: rgba(30, 60, 100, 0.28);
    border: 1px solid rgba(80, 140, 220, 0.42); color: #aaccff;
    font-family: 'Rajdhani', sans-serif; font-size: 0.93rem; font-weight: 600;
    text-decoration: none; cursor: pointer; transition: var(--fn-transition);
}
.fn-home-btn:hover { background: rgba(40, 80, 140, 0.40); color: #cce0ff; text-decoration: none; }

/* ── Empty State ── */
.fn-empty-state {
    display: flex; flex-direction: column; align-items: center;
    justify-content: center; gap: 18px;
    padding: 64px 28px;
    background: rgba(30, 20, 0, 0.55);
    border: 2px dashed rgba(200, 155, 0, 0.32);
    border-radius: var(--fn-radius);
    text-align: center;
    animation: cardIn 0.55s ease both;
}
.fn-empty-icon {
    font-size: 3.5rem; color: rgba(220, 170, 0, 0.48);
    animation: fnEmptyPulse 2.4s ease-in-out infinite;
}
@keyframes fnEmptyPulse {
    0%,100% { opacity: 0.48; transform: scale(1);    }
    50%     { opacity: 0.85; transform: scale(1.10); }
}
.fn-empty-title {
    font-family: 'Orbitron', sans-serif; font-size: 1.15rem;
    font-weight: 700; color: var(--fn-gold); margin: 0;
}
.fn-empty-desc {
    font-family: 'Rajdhani', sans-serif; font-size: 0.95rem;
    color: var(--fn-text-muted); max-width: 440px; margin: 0; line-height: 1.6;
}
.fn-empty-back {
    display: inline-flex; align-items: center; padding: 9px 26px;
    border-radius: 50px;
    background: rgba(80, 55, 0, 0.35);
    border: 1px solid rgba(200, 155, 0, 0.42); color: var(--fn-gold-light);
    font-family: 'Rajdhani', sans-serif; font-size: 0.95rem; font-weight: 600;
    text-decoration: none; transition: var(--fn-transition);
}
.fn-empty-back:hover { background: rgba(130, 90, 0, 0.50); color: #fff8dd; text-decoration: none; }
</style>

@endsection

@push('scripts')
<script>
    function printDiv() {
        var divContents = document.getElementById("rank-table-container").innerHTML;
        var a = window.open('', '', 'height=1000, width=700');
        a.document.write('<html>');
        a.document.write(
            `<head><style>@media print { body { text-align:center; margin-top:50px; font-family:Arial,sans-serif; }
            table { margin:0 auto; border-collapse:collapse; }
            th, td { padding:12px 18px; text-align:center; border:1px solid #000; }
            h1 { font-size:36px; margin-bottom:20px; }
            .fn-signature { margin-top:30px; display:flex; flex-direction:column; align-items:center; gap:6px; }
            .fn-sig-line { border-bottom:2px solid black; padding:0 30px; font-size:14px; }
            .fn-sig-desc { font-size:12px; }
            #print-btn { display:none; }
            .fn-rank-judge { font-size:18px; margin-bottom:20px; }
            .fn-rank-header { font-size:28px; margin-bottom:8px; }
            }</style></head>`
        );
        a.document.write('<body>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>
<script type="module">
    $(document).ready(function () {
        $("input[type=number]").on('focus', function () { this.select(); });
        function fnStepInput($input, dir) {
            const step = parseFloat($input.attr('step')) || 0.1, max = parseFloat($input.attr('max')) || 10, min = parseFloat($input.attr('min')) || 1;
            const next = Math.round((parseFloat($input.val()) + dir * step) * 10) / 10;
            if (next >= min && next <= max) $input.val(next.toFixed(1));
        }
        $(document).on('touchend click', '.fn-step-up', function (e) { e.preventDefault(); fnStepInput($(this).closest('.fn-stepper').find('input'), +1); });
        $(document).on('touchend click', '.fn-step-dn', function (e) { e.preventDefault(); fnStepInput($(this).closest('.fn-stepper').find('input'), -1); });

        $('#finals-form').submit(function (event) {
            event.preventDefault();
            const $btn = $('.fn-submit-btn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{ route('post_final_form') }}',
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Scores Saved!',
                        text: 'Final Q&A grading submitted successfully.',
                        background: 'rgba(14, 10, 0, 0.97)',
                        color: '#fff8e0',
                        iconColor: '#f5c842',
                        showConfirmButton: false,
                        timer: 2800,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.style.border = '1px solid rgba(200,155,0,0.45)';
                            toast.style.boxShadow = '0 8px 32px rgba(160,110,0,0.40)';
                        }
                    });
                    $('#generate-rank').removeAttr('hidden');
                    loadRankings(true);
                    $btn.prop('disabled', false);
                },
                error: function (error) {
                    $btn.prop('disabled', false);
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Submission Failed',
                        text: error.responseJSON?.message ?? 'Please check your scores and try again.',
                        background: 'rgba(14, 10, 0, 0.97)',
                        color: '#fff8e0',
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.style.border = '1px solid rgba(220,50,80,0.50)';
                        }
                    });
                }
            });
        });

        function loadRankings(forceScroll) {
            var alreadyVisible = !document.getElementById('rank-table-container').hasAttribute('hidden');
            $('#rank-table').empty();
            $.ajax({
                type: 'GET',
                url: '{{ route('rank_final') }}',
                success: function (response) {
                    $.each(response.ranking, function (key, value) {
                        var newRow = $(`
                            <tr>
                                <td>${value.ranking}</td>
                                <td>${value.contestant_number}</td>
                                <td>${value.contestant_name}</td>
                                <td>${value.score}</td>
                            </tr>`);
                        $('#rank-table').append(newRow);
                    });
                    document.getElementById('rank-table-container').removeAttribute('hidden');
                    $('#generate-rank').prop('disabled', false);
                    if (!alreadyVisible || forceScroll) {
                        var target = $('#rank-table-container').offset().top - 24;
                        $('html, body').animate({ scrollTop: target }, 1200, 'swing');
                    }
                },
                error: function (error) {
                    console.error(error);
                }
            });
        }

        $('#generate-rank').click(function (event) {
            event.preventDefault();
            loadRankings();
        });
    });
</script>
@endpush
