<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Surogon Pageant 2026 — Enter the Universe</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/SDN_LOGO.svg') }}" />

    {{-- Google Fonts: Orbitron (sci-fi headers) + Rajdhani (body) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Rajdhani:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/galaxy.js'])

    <style>
        /* ─── Reset & base ─────────────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html, body {
            width: 100%; height: 100%;
            overflow: hidden;
            background: #02000f;
            font-family: 'Rajdhani', sans-serif;
        }

        /* ─── Three.js canvas fills the entire screen ──────────── */
        #galaxy-canvas {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: 0;
        }

        /* ─── full-page overlay container ──────────────────────── */
        .universe-overlay {
            position: fixed;
            inset: 0;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            pointer-events: none;
        }

        /* ─── title / branding block ────────────────────────────── */
        .brand-block {
            text-align: center;
            margin-bottom: 28px;
            pointer-events: none;
            animation: floatUp 1.2s ease both;
        }

        .brand-logo {
            width: 110px;
            filter: drop-shadow(0 0 14px #aa00ff) drop-shadow(0 0 30px #6600ff);
            animation: pulseLogo 3s ease-in-out infinite;
        }

        @keyframes pulseLogo {
            0%, 100% { filter: drop-shadow(0 0 14px #aa00ff) drop-shadow(0 0 30px #6600ff); }
            50%       { filter: drop-shadow(0 0 24px #dd00ff) drop-shadow(0 0 55px #9900ff); }
        }

        .brand-title {
            font-family: 'Orbitron', sans-serif;
            font-size: clamp(1.1rem, 3vw, 1.75rem);
            font-weight: 900;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            background: linear-gradient(90deg, #c77dff, #48cae4, #c77dff);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmerText 4s linear infinite;
            margin-top: 14px;
            line-height: 1.2;
        }

        @keyframes shimmerText {
            0%   { background-position: 0% center; }
            100% { background-position: 200% center; }
        }

        .brand-tagline {
            font-size: clamp(0.7rem, 1.8vw, 0.88rem);
            color: #a0a8cc;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            margin-top: 6px;
            font-weight: 300;
        }

        /* ─── Glassmorphism login card ──────────────────────────── */
        .galaxy-card {
            pointer-events: all;
            width: min(420px, 94vw);
            background: rgba(5, 2, 25, 0.62);
            border: 1px solid rgba(160, 80, 255, 0.35);
            border-radius: 20px;
            backdrop-filter: blur(22px) saturate(1.6);
            -webkit-backdrop-filter: blur(22px) saturate(1.6);
            box-shadow:
                0 0 40px rgba(120, 0, 255, 0.25),
                0 0 90px rgba(80, 0, 180, 0.12),
                inset 0 1px 0 rgba(200, 150, 255, 0.12);
            padding: 40px 36px 36px;
            animation: floatUp 1.4s ease both;
            position: relative;
            overflow: hidden;
        }

        /* corner accent lines */
        .galaxy-card::before,
        .galaxy-card::after {
            content: '';
            position: absolute;
            width: 60px; height: 60px;
            border-color: rgba(160, 80, 255, 0.55);
            border-style: solid;
        }
        .galaxy-card::before { top: 12px; left: 12px; border-width: 2px 0 0 2px; border-radius: 6px 0 0 0; }
        .galaxy-card::after  { bottom: 12px; right: 12px; border-width: 0 2px 2px 0; border-radius: 0 0 6px 0; }

        /* subtle scan-line shimmer across card */
        .galaxy-card .scanline {
            position: absolute;
            top: -100%; left: 0;
            width: 100%; height: 60%;
            background: linear-gradient(transparent, rgba(160, 80, 255, 0.04), transparent);
            animation: scan 6s linear infinite;
            pointer-events: none;
        }

        @keyframes scan {
            0%   { top: -60%; }
            100% { top: 120%; }
        }

        /* ─── Form labels ───────────────────────────────────────── */
        .form-label-cosmos {
            display: block;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.7rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #c77dff;
            margin-bottom: 8px;
        }

        /* ─── Inputs ────────────────────────────────────────────── */
        .cosmos-input {
            width: 100%;
            background: rgba(10, 5, 40, 0.7);
            border: 1px solid rgba(130, 60, 255, 0.4);
            border-radius: 10px;
            color: #e8e0ff;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            padding: 12px 16px;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
            letter-spacing: 0.05em;
        }

        .cosmos-input::placeholder { color: #4a3870; }

        .cosmos-input:focus {
            border-color: #aa44ff;
            box-shadow: 0 0 12px rgba(170, 68, 255, 0.5), 0 0 28px rgba(100, 0, 255, 0.2);
        }

        .cosmos-input.is-invalid {
            border-color: #ff4488;
            box-shadow: 0 0 10px rgba(255, 40, 100, 0.4);
        }

        .invalid-feedback-cosmos {
            color: #ff6699;
            font-size: 0.8rem;
            margin-top: 5px;
            letter-spacing: 0.05em;
        }

        /* ─── Login button ──────────────────────────────────────── */
        .btn-cosmos {
            width: 100%;
            padding: 13px;
            border-radius: 50px;
            border: 1px solid rgba(160, 80, 255, 0.7);
            background: linear-gradient(135deg, rgba(90, 0, 180, 0.8) 0%, rgba(40, 0, 120, 0.85) 100%);
            color: #e8d5ff;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.35s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-cosmos::before {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            width: 0; height: 0;
            background: rgba(200, 100, 255, 0.25);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .btn-cosmos:hover {
            border-color: #cc77ff;
            box-shadow: 0 0 20px rgba(180, 80, 255, 0.6), 0 0 50px rgba(120, 0, 255, 0.3);
            color: #fff;
            transform: translateY(-1px);
        }

        .btn-cosmos:hover::before { width: 300px; height: 300px; }

        .btn-cosmos:active { transform: translateY(0); }

        /* ─── Divider ───────────────────────────────────────────── */
        .cosmos-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0;
        }
        .cosmos-divider span {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(160, 80, 255, 0.4), transparent);
        }
        .cosmos-divider p {
            font-size: 0.7rem;
            color: #6a5590;
            letter-spacing: 0.15em;
            text-transform: uppercase;
        }

        /* ─── Float-up entrance animation ───────────────────────── */
        @keyframes floatUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ─── Scrolling tagline (bottom) ────────────────────────── */
        .cosmos-footer {
            position: fixed;
            bottom: 22px;
            left: 0; right: 0;
            text-align: center;
            z-index: 20;
            pointer-events: none;
        }

        .cosmos-footer p {
            font-size: 0.68rem;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: rgba(140, 100, 220, 0.55);
        }

        /* ─── Orbital ring decoration on card top ───────────────── */
        .orbit-ring {
            position: absolute;
            top: -50px;
            right: -50px;
            width: 130px; height: 130px;
            border-radius: 50%;
            border: 1px solid rgba(150, 60, 255, 0.22);
            animation: spinRing 18s linear infinite;
            pointer-events: none;
        }

        .orbit-ring::after {
            content: '';
            position: absolute;
            top: -3px; left: 50%;
            width: 6px; height: 6px;
            background: #bb66ff;
            border-radius: 50%;
            box-shadow: 0 0 10px #bb66ff;
            transform: translateX(-50%);
        }

        @keyframes spinRing {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }

        /* ─── xs screen tweaks ──────────────────────────────────── */
        @media (max-height: 680px) {
            .brand-logo { width: 70px; }
            .brand-block { margin-bottom: 14px; }
            .galaxy-card { padding: 24px 24px 22px; }
        }
    </style>
</head>
<body>

    {{-- Three.js canvas --}}
    <canvas id="galaxy-canvas"></canvas>

    {{-- ─── Main overlay ───────────────────────────────────────── --}}
    <div class="universe-overlay">

        {{-- Branding --}}
        <div class="brand-block">
            <img src="{{ asset('images/surigay_logo.png') }}" alt="Surogon Pageant 2026" class="brand-logo">
            <h1 class="brand-title">Surogon Pageant&nbsp;2026</h1>
            <p class="brand-tagline">Women of limitless potential &mdash; Beyond the Stars</p>
        </div>

        {{-- Glass login card --}}
        <div class="galaxy-card">
            <div class="scanline"></div>
            <div class="orbit-ring"></div>

            {{-- Card header --}}
            <p style="font-family:'Orbitron',sans-serif;font-size:0.65rem;letter-spacing:0.3em;color:#7755aa;text-transform:uppercase;text-align:center;margin-bottom:28px;">
                — Access Portal —
            </p>

            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                {{-- Email --}}
                <div style="margin-bottom:20px;">
                    <label for="email" class="form-label-cosmos">
                        <i class="bi bi-person-fill" style="margin-right:6px;"></i>Email Address
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="your@email.com"
                        autocomplete="email"
                        autofocus
                        required
                        class="cosmos-input @error('email') is-invalid @enderror"
                    >
                    @error('email')
                        <div class="invalid-feedback-cosmos"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div style="margin-bottom:28px;">
                    <label for="password" class="form-label-cosmos">
                        <i class="bi bi-shield-lock-fill" style="margin-right:6px;"></i>Password
                    </label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        autocomplete="current-password"
                        required
                        class="cosmos-input @error('password') is-invalid @enderror"
                    >
                    @error('password')
                        <div class="invalid-feedback-cosmos"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-cosmos">
                    <i class="bi bi-stars" style="margin-right:8px;"></i>Enter the Universe
                </button>
            </form>

            {{-- Divider --}}
            <div class="cosmos-divider">
                <span></span>
                <p>Judging System</p>
                <span></span>
            </div>

            <p style="text-align:center;font-size:0.72rem;color:#5a4480;letter-spacing:0.05em;">
                Authorized personnel only &mdash; credentials required
            </p>
        </div>
    </div>

    {{-- Footer --}}
    <div class="cosmos-footer">
        <p>Surogon Pageant 2026 &nbsp;·&nbsp; Powered by the Universe</p>
    </div>

</body>
</html>

