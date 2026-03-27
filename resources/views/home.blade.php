@extends('layouts.app')

@section('content')

    {{-- ══════════════════════════════════════════════════════════
    FUTURISTIC BACKGROUND LAYERS (fixed, behind everything)
    ══════════════════════════════════════════════════════════ --}}
    <div class="hd-bg" aria-hidden="true">
        {{-- deep base gradient --}}
        <div class="hd-base"></div>
        {{-- animated nebula orbs --}}
        <div class="hd-orb hd-orb-1"></div>
        <div class="hd-orb hd-orb-2"></div>
        <div class="hd-orb hd-orb-3"></div>
        <div class="hd-orb hd-orb-4"></div>
        <div class="hd-orb hd-orb-5"></div>
        {{-- grid overlay --}}
        <div class="hd-grid"></div>
        {{-- scan-line sweep --}}
        <div class="hd-scan"></div>
        {{-- star field canvas --}}
        <canvas class="hd-stars" id="hd-star-canvas"></canvas>
        {{-- top edge accent line --}}
        <div class="hd-edge-top"></div>
    </div>

    {{-- ══════════════════════════════════════════════════════════
    JUDGE DASHBOARD
    ══════════════════════════════════════════════════════════ --}}
    <div class="judge-dashboard">

        {{-- ── Welcome Banner ─────────────────────────────────── --}}
        <div class="welcome-banner">
            <div class="wb-inner">
                <div class="wb-avatar">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div class="wb-text">
                    <p class="wb-label">Welcome back, Judge</p>
                    <h2 class="wb-name">{{ Auth::user()->RealName ?? Auth::user()->name }}</h2>
                </div>
                <div class="wb-crown">
                    <i class="bi bi-award-fill"></i>
                </div>
            </div>
        </div>

        {{-- ── Section Cards ───────────────────────────────────── --}}
        <div class="dashboard-grid">

            {{-- ── TOP 10 SELECTION ─────────────────────────────── --}}
            <div class="section-card card-violet">
                <div class="sc-header">
                    <div class="sc-icon-wrap violet-glow">
                        <i class="bi bi-stars"></i>
                    </div>
                    <div>
                        <p class="sc-sub">Round 1</p>
                        <h3 class="sc-title">Top 8 Selection</h3>
                    </div>
                    <span class="sc-badge">2 Events</span>
                </div>

                <p class="sc-desc">Score all contestants for the Top 8 qualifying round. Each event is judged independently.
                </p>

                <div class="sc-buttons">
                    <a href="{{ route('swimsuit_form') }}" class="judge-btn btn-swimwear">
                        <span class="jb-icon"><i class="bi bi-hearts"></i></span>
                        <span class="jb-body">
                            <span class="jb-title">Swimwear</span>
                            <span class="jb-sub">Beach attire scoring</span>
                        </span>
                        <i class="bi bi-chevron-right jb-arrow"></i>
                    </a>

                    <a href="{{ route('gown_form') }}" class="judge-btn btn-gown">
                        <span class="jb-icon"><i class="bi bi-suit-heart-fill"></i></span>
                        <span class="jb-body">
                            <span class="jb-title">Evening Gown</span>
                            <span class="jb-sub">Formal wear elegance</span>
                        </span>
                        <i class="bi bi-chevron-right jb-arrow"></i>
                    </a>

                </div>
            </div>

            {{-- ── TOP 5 SELECTION ──────────────────────────────── --}}
            <div class="section-card card-teal">
                <div class="sc-header">
                    <div class="sc-icon-wrap teal-glow">
                        <i class="bi bi-chat-right-heart-fill"></i>
                    </div>
                    <div>
                        <p class="sc-sub">Round 2</p>
                        <h3 class="sc-title">Top 5 Selection</h3>
                    </div>
                    <span class="sc-badge">1 Event</span>
                </div>

                <p class="sc-desc">Score the shortlisted Top 8 contestants for the Snap Talk question round to determine the
                    Top 5.</p>

                <div class="sc-buttons">
                    <a href="{{ route('question_form') }}" class="judge-btn btn-snaptalk">
                        <span class="jb-icon"><i class="bi bi-chat-right-heart-fill"></i></span>
                        <span class="jb-body">
                            <span class="jb-title">Snap Talk</span>
                            <span class="jb-sub">Q&amp;A response scoring</span>
                        </span>
                        <i class="bi bi-chevron-right jb-arrow"></i>
                    </a>
                </div>
            </div>

            {{-- ── FINAL PLACEMENT ──────────────────────────────── --}}
            <div class="section-card card-rose">
                <div class="sc-header">
                    <div class="sc-icon-wrap rose-glow">
                        <i class="bi bi-gem"></i>
                    </div>
                    <div>
                        <p class="sc-sub">Final Round</p>
                        <h3 class="sc-title">Final Placement</h3>
                    </div>
                    <span class="sc-badge sc-badge-final">Grand Final</span>
                </div>

                <p class="sc-desc">Determine the ultimate winner. Score the Top 5 finalists in the final Q&amp;A to crown
                    Kababajinhang Surogon 2026.</p>

                <div class="sc-buttons">
                    <a href="{{ route('final_form') }}" class="judge-btn btn-final">
                        <span class="jb-icon"><i class="bi bi-trophy-fill"></i></span>
                        <span class="jb-body">
                            <span class="jb-title">Final Q &amp; A</span>
                            <span class="jb-sub">Crowning moment scoring</span>
                        </span>
                        <i class="bi bi-chevron-right jb-arrow"></i>
                    </a>
                </div>
            </div>

        </div>{{-- /dashboard-grid --}}

        {{-- ── Scrolling marquee ───────────────────────────────── --}}
        <div class="cosmos-marquee">
            <div class="cm-track">
                @for ($i = 0; $i < 3; $i++)
                    <span><i class="bi bi-star-fill"></i> Grand Coronation Night of the Kababajinhang Surogon 2026</span>
                    <span><i class="bi bi-star-fill"></i> Rainbow Connection — Surigao Del Norte</span>
                    <span><i class="bi bi-star-fill"></i> Provincial Government of Surigao Del Norte</span>
                    <span><i class="bi bi-star-fill"></i> Provincial ICT Office (PICTO)</span>
                    <span><i class="bi bi-star-fill"></i> Kababajinhang Surogon 2026</span>
                @endfor
            </div>
        </div>

        {{-- ── Footer ──────────────────────────────────────────── --}}
        <footer class="dash-footer">
            <img src="{{ URL::asset('../images/SDN_LOGO.svg') }}" alt="SDN" class="footer-logo">
            <p>Developed by <span>PGSDN-Provincial ICT Office</span></p>
            <img src="{{ URL::asset('../images/PICTO_LOGO.svg') }}" alt="PICTO" class="footer-logo">
        </footer>

    </div>{{-- /judge-dashboard --}}

    <style>
        /* ─── custom property tokens ─────────────────────────────── */
        :root {
            --cosmos-bg: #04001a;
            --cosmos-surface: rgba(12, 4, 48, 0.72);
            --cosmos-border: rgba(140, 70, 255, 0.28);
            --cosmos-glow1: #aa44ff;
            --cosmos-glow2: #6600cc;
            --text-primary: #f0ebff;
            --text-secondary: #a89acc;
            --radius-card: 20px;
            --radius-btn: 14px;
            --transition: all 0.3s cubic-bezier(.4, 0, .2, 1);
        }

        /* ─── dashboard wrapper ──────────────────────────────────── */
        .judge-dashboard {
            min-height: calc(100vh - 70px);
            padding: 28px 20px 20px;
            display: flex;
            flex-direction: column;
            gap: 24px;
            max-width: 1100px;
            margin: 0 auto;
        }

        /* ─── welcome banner ─────────────────────────────────────── */
        .welcome-banner {
            background: linear-gradient(135deg, rgba(80, 0, 160, 0.55) 0%, rgba(10, 0, 55, 0.75) 100%);
            border: 1px solid rgba(180, 100, 255, 0.35);
            border-radius: var(--radius-card);
            backdrop-filter: blur(20px);
            padding: 22px 28px;
            box-shadow: 0 0 40px rgba(120, 0, 255, 0.18), inset 0 1px 0 rgba(200, 150, 255, 0.10);
            position: relative;
            overflow: hidden;
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 80% 50%, rgba(160, 80, 255, 0.12) 0%, transparent 65%);
            pointer-events: none;
        }

        .wb-inner {
            display: flex;
            align-items: center;
            gap: 18px;
            position: relative;
            z-index: 1;
        }

        .wb-avatar {
            font-size: 3.2rem;
            color: #cc88ff;
            filter: drop-shadow(0 0 12px #aa44ff);
            flex-shrink: 0;
            line-height: 1;
        }

        .wb-text {
            flex: 1;
        }

        .wb-label {
            font-size: 0.72rem;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--text-secondary);
            margin: 0 0 4px;
        }

        .wb-name {
            font-family: 'Orbitron', 'Rajdhani', sans-serif;
            font-size: clamp(1.15rem, 3vw, 1.65rem);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0 0 8px;
            text-shadow: 0 0 20px rgba(180, 100, 255, 0.5);
        }

        .wb-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 50px;
            background: rgba(119, 40, 255, 0.5);
            border: 1px solid rgba(160, 80, 255, 0.40);
            font-size: 0.7rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #f3f3f3;
        }

        .wb-crown {
            font-size: 2.8rem;
            color: rgba(200, 150, 255, 0.25);
            flex-shrink: 0;
            animation: floatCrown 3.5s ease-in-out infinite;
        }

        @keyframes floatCrown {

            0%,
            100% {
                transform: translateY(0) rotate(-5deg);
            }

            50% {
                transform: translateY(-6px) rotate(5deg);
            }
        }

        /* ─── dashboard grid: 1 col mobile → 3 col desktop ──────── */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        @media (min-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (min-width: 1024px) {
            .dashboard-grid {
                grid-template-columns: 1fr 1fr 1fr;
            }
        }

        /* ─── section cards ──────────────────────────────────────── */
        .section-card {
            background: var(--cosmos-surface);
            border: 1px solid var(--cosmos-border);
            border-radius: var(--radius-card);
            backdrop-filter: blur(18px);
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            box-shadow: 0 4px 30px rgba(80, 0, 180, 0.14);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .section-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            border-radius: var(--radius-card) var(--radius-card) 0 0;
        }

        .card-violet::after {
            background: linear-gradient(90deg, #aa44ff, #6600cc);
        }

        .card-teal::after {
            background: linear-gradient(90deg, #f5c842, #b89020);
        }

        .card-rose::after {
            background: linear-gradient(90deg, #7a5400, #c9960a, #ffe066, #f5c842, #c9960a, #7a5400);
            background-size: 300% 100%;
            animation: roseBarShimmer 3s linear infinite;
        }

        .section-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 40px rgba(120, 0, 255, 0.22);
            border-color: rgba(180, 100, 255, 0.45);
        }

        .card-rose {
            border-color: rgba(200, 150, 0, 0.28);
            box-shadow: 0 4px 30px rgba(180, 120, 0, 0.14);
            animation: roseCardGlow 4s ease-in-out infinite;
        }

        .card-rose:hover {
            border-color: rgba(240, 190, 0, 0.65) !important;
            box-shadow: 0 8px 40px rgba(200, 150, 0, 0.35) !important;
        }

        @keyframes roseCardGlow {

            0%,
            100% {
                box-shadow: 0 4px 30px rgba(180, 120, 0, 0.14), 0 0 0 0 rgba(200, 155, 0, 0);
            }

            50% {
                box-shadow: 0 4px 40px rgba(200, 150, 0, 0.28), 0 0 18px 2px rgba(200, 150, 0, 0.12);
            }
        }

        @keyframes roseBarShimmer {
            from {
                background-position: 100% 0;
            }

            to {
                background-position: -200% 0;
            }
        }

        /* sc-header */
        .sc-header {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .sc-icon-wrap {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            font-size: 1.35rem;
            flex-shrink: 0;
        }

        .violet-glow {
            background: rgba(110, 0, 220, 0.35);
            color: #cc77ff;
            box-shadow: 0 0 16px rgba(160, 60, 255, 0.35);
        }

        .teal-glow {
            background: rgba(160, 120, 0, 0.30);
            color: #f5c842;
            box-shadow: 0 0 16px rgba(200, 155, 0, 0.35);
        }

        .rose-glow {
            background: rgba(160, 110, 0, 0.35);
            color: #f5c842;
            box-shadow: 0 0 18px rgba(220, 170, 0, 0.50);
            animation: roseIconPulse 2.5s ease-in-out infinite;
        }

        @keyframes roseIconPulse {

            0%,
            100% {
                box-shadow: 0 0 14px rgba(200, 150, 0, 0.40);
            }

            50% {
                box-shadow: 0 0 26px rgba(240, 190, 0, 0.75);
            }
        }

        .sc-sub {
            font-size: 0.68rem;
            letter-spacing: 0.20em;
            text-transform: uppercase;
            color: var(--text-secondary);
            margin: 0 0 2px;
        }

        .sc-title {
            font-family: 'Orbitron', 'Rajdhani', sans-serif;
            font-size: 1.0rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .sc-badge {
            margin-left: auto;
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.65rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            background: rgba(100, 40, 200, 0.30);
            border: 1px solid rgba(150, 80, 255, 0.35);
            color: #bb88ff;
            white-space: nowrap;
        }

        .sc-badge-final {
            background: rgba(140, 100, 0, 0.40);
            border-color: rgba(220, 170, 0, 0.55);
            color: #ffe066;
            text-shadow: 0 0 8px rgba(240, 190, 0, 0.60);
            animation: badgeGoldPulse 2.8s ease-in-out infinite;
        }

        @keyframes badgeGoldPulse {

            0%,
            100% {
                box-shadow: 0 0 6px rgba(200, 150, 0, 0.25);
            }

            50% {
                box-shadow: 0 0 14px rgba(240, 190, 0, 0.55);
            }
        }

        .sc-desc {
            font-size: 0.83rem;
            color: var(--text-secondary);
            line-height: 1.55;
            margin: 0;
        }

        /* ─── judge buttons ──────────────────────────────────────── */
        .sc-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: auto;
        }

        .judge-btn {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 13px 16px;
            border-radius: var(--radius-btn);
            text-decoration: none;
            transition: var(--transition);
            border: 1px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .judge-btn::before {
            content: '';
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .judge-btn:hover::before {
            opacity: 1;
        }

        .judge-btn:hover {
            transform: translateX(3px);
            text-decoration: none;
        }

        .judge-btn:active {
            transform: translateX(0) scale(0.98);
        }

        /* swimwear */
        .btn-swimwear {
            background: rgba(0, 170, 200, 0.18);
            border-color: rgba(0, 200, 230, 0.35);
        }

        .btn-swimwear::before {
            background: rgba(0, 200, 230, 0.08);
        }

        .btn-swimwear .jb-icon {
            color: #33ddee;
            background: rgba(0, 180, 210, 0.20);
        }

        .btn-swimwear:hover {
            border-color: rgba(0, 220, 255, 0.6);
            box-shadow: 0 0 18px rgba(0, 200, 230, 0.25);
        }

        /* gown */
        .btn-gown {
            background: rgba(180, 100, 200, 0.18);
            border-color: rgba(200, 100, 220, 0.30);
        }

        .btn-gown::before {
            background: rgba(200, 100, 220, 0.08);
        }

        .btn-gown .jb-icon {
            color: #dd88ff;
            background: rgba(180, 80, 200, 0.22);
        }

        .btn-gown:hover {
            border-color: rgba(220, 110, 255, 0.6);
            box-shadow: 0 0 18px rgba(180, 80, 220, 0.25);
        }

        /* filipiniana */
        .btn-filipiniana {
            background: rgba(90, 110, 200, 0.18);
            border-color: rgba(100, 120, 220, 0.30);
        }

        .btn-filipiniana::before {
            background: rgba(100, 120, 220, 0.08);
        }

        .btn-filipiniana .jb-icon {
            color: #99aaff;
            background: rgba(80, 100, 200, 0.22);
        }

        .btn-filipiniana:hover {
            border-color: rgba(120, 140, 255, 0.6);
            box-shadow: 0 0 18px rgba(100, 120, 220, 0.25);
        }

        /* snaptalk */
        .btn-snaptalk {
            background: rgba(160, 120, 0, 0.18);
            border-color: rgba(200, 160, 0, 0.30);
        }

        .btn-snaptalk::before {
            background: rgba(200, 160, 0, 0.08);
        }

        .btn-snaptalk .jb-icon {
            color: #f5c842;
            background: rgba(160, 120, 0, 0.22);
        }

        .btn-snaptalk:hover {
            border-color: rgba(220, 170, 0, 0.60);
            box-shadow: 0 0 18px rgba(200, 155, 0, 0.28);
        }

        /* final */
        .btn-final {
            background: rgba(140, 100, 0, 0.22);
            border-color: rgba(200, 155, 0, 0.40);
        }

        .btn-final::before {
            background: rgba(200, 160, 0, 0.10);
        }

        .btn-final .jb-icon {
            color: #f5c842;
            background: rgba(160, 115, 0, 0.30);
        }

        .btn-final:hover {
            border-color: rgba(240, 190, 0, 0.70);
            box-shadow: 0 0 22px rgba(200, 155, 0, 0.40);
        }

        /* jb-icon common */
        .jb-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            font-size: 1.15rem;
            flex-shrink: 0;
            transition: var(--transition);
        }

        .judge-btn:hover .jb-icon {
            transform: scale(1.1);
        }

        .jb-body {
            display: flex;
            flex-direction: column;
            gap: 2px;
            flex: 1;
        }

        .jb-title {
            font-weight: 700;
            font-size: 0.92rem;
            color: var(--text-primary);
            letter-spacing: 0.04em;
        }

        .jb-sub {
            font-size: 0.72rem;
            color: var(--text-secondary);
        }

        .jb-arrow {
            color: rgba(180, 150, 255, 0.45);
            font-size: 0.85rem;
            transition: var(--transition);
        }

        .judge-btn:hover .jb-arrow {
            color: rgba(200, 160, 255, 0.85);
            transform: translateX(3px);
        }

        /* ─── scrolling marquee ──────────────────────────────────── */
        .cosmos-marquee {
            overflow: hidden;
            border-radius: 50px;
            background: rgba(60, 20, 110, 0.30);
            border: 1px solid rgba(120, 60, 200, 0.25);
            padding: 10px 0;
        }

        .cm-track {
            display: flex;
            gap: 0;
            white-space: nowrap;
            animation: marqueeScroll 38s linear infinite;
        }

        .cm-track span {
            font-size: 0.78rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: rgba(180, 140, 255, 0.75);
            padding: 0 32px;
            flex-shrink: 0;
        }

        .cm-track span i {
            color: rgba(220, 160, 255, 0.55);
            font-size: 0.6rem;
            margin-right: 6px;
        }

        @keyframes marqueeScroll {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-33.333%);
            }
        }

        /* ─── footer ─────────────────────────────────────────────── */
        .dash-footer {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            padding: 14px 0 6px;
            flex-wrap: wrap;
        }

        .dash-footer p {
            font-size: 0.75rem;
            color: var(--text-secondary);
            letter-spacing: 0.08em;
            margin: 0;
            text-align: center;
        }

        .dash-footer p span {
            color: #cc88ff;
            font-weight: 600;
        }

        .footer-logo {
            max-height: 50px;
            filter: brightness(0.9) saturate(0.8);
            opacity: 0.85;
            transition: opacity 0.2s;
        }

        .footer-logo:hover {
            opacity: 1;
        }

        /* ─── tablet tweaks (768–1023px) ─────────────────────────── */
        @media (min-width: 768px) and (max-width: 1023px) {
            .judge-dashboard {
                padding: 22px 18px;
            }

            .welcome-banner {
                padding: 20px 22px;
            }

            .wb-crown {
                display: none;
            }

            .section-card:last-child {
                grid-column: 1 / -1;
            }
        }

        /* ─── small mobile ────────────────────────────────────────── */
        @media (max-width: 500px) {
            .wb-avatar {
                font-size: 2.4rem;
            }

            .wb-name {
                font-size: 1.1rem;
            }

            .wb-badge {
                font-size: 0.62rem;
            }

            .wb-crown {
                display: none;
            }

            .section-card {
                padding: 18px;
            }

            .sc-title {
                font-size: 0.92rem;
            }
        }

        /* ══════════════════════════════════════════════════════════
       FUTURISTIC BACKGROUND
    ══════════════════════════════════════════════════════════ */

        /* override body & app wrapper */
        body,
        #app,
        #main-content {
            background: transparent !important;
            position: relative;
        }

        body {
            background-color: #03001c !important;
        }

        /* ── fixed bg container ─────────────────────────────────── */
        .hd-bg {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }

        /* ── deep base: navy → midnight-purple gradient ────────── */
        .hd-base {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 120% 80% at 50% 0%, #12005e 0%, transparent 60%),
                radial-gradient(ellipse 100% 60% at 100% 100%, #000a3a 0%, transparent 55%),
                radial-gradient(ellipse 90% 70% at 0% 100%, #1a003a 0%, transparent 55%),
                linear-gradient(175deg, #03001c 0%, #07003a 35%, #0a0035 60%, #02001a 100%);
        }

        /* ── nebula orbs ────────────────────────────────────────── */
        .hd-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            opacity: 0;
            animation: orbPulse var(--dur, 12s) ease-in-out var(--delay, 0s) infinite;
        }

        .hd-orb-1 {
            width: 520px;
            height: 520px;
            background: radial-gradient(circle, rgba(120, 0, 255, 0.38) 0%, transparent 70%);
            top: -10%;
            left: -8%;
            --dur: 14s;
            --delay: 0s;
        }

        .hd-orb-2 {
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(60, 0, 180, 0.32) 0%, transparent 70%);
            top: 20%;
            right: -6%;
            --dur: 11s;
            --delay: 2s;
        }

        .hd-orb-3 {
            width: 600px;
            height: 350px;
            background: radial-gradient(ellipse, rgba(80, 20, 200, 0.28) 0%, transparent 70%);
            bottom: -5%;
            left: 15%;
            --dur: 16s;
            --delay: 4s;
        }

        .hd-orb-4 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(160, 40, 255, 0.25) 0%, transparent 70%);
            top: 45%;
            left: 40%;
            --dur: 9s;
            --delay: 1.5s;
        }

        .hd-orb-5 {
            width: 380px;
            height: 260px;
            background: radial-gradient(ellipse, rgba(30, 0, 120, 0.30) 0%, transparent 70%);
            top: 5%;
            right: 25%;
            --dur: 13s;
            --delay: 3s;
        }

        @keyframes orbPulse {

            0%,
            100% {
                opacity: 0;
                transform: scale(0.92);
            }

            40%,
            60% {
                opacity: 1;
                transform: scale(1.06);
            }
        }

        /* ── perspective grid ───────────────────────────────────── */
        .hd-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(100, 50, 255, 0.07) 1px, transparent 1px),
                linear-gradient(90deg, rgba(100, 50, 255, 0.07) 1px, transparent 1px);
            background-size: 52px 52px;
            mask-image: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.5) 30%, rgba(0, 0, 0, 0.5) 70%, transparent 100%);
            -webkit-mask-image: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.5) 30%, rgba(0, 0, 0, 0.5) 70%, transparent 100%);
            animation: gridDrift 30s linear infinite;
        }

        @keyframes gridDrift {
            from {
                background-position: 0 0, 0 0;
            }

            to {
                background-position: 52px 52px, 52px 52px;
            }
        }

        /* ── scan-line sweep ────────────────────────────────────── */
        .hd-scan {
            position: absolute;
            left: 0;
            right: 0;
            height: 220px;
            background: linear-gradient(to bottom, transparent, rgba(120, 50, 255, 0.06), transparent);
            animation: scanSweep 8s linear infinite;
            pointer-events: none;
        }

        @keyframes scanSweep {
            from {
                top: -220px;
            }

            to {
                top: 110%;
            }
        }

        /* ── star canvas ────────────────────────────────────────── */
        .hd-stars {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }

        /* ── top accent line ────────────────────────────────────── */
        .hd-edge-top {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg,
                    transparent 0%,
                    rgba(120, 50, 255, 0.6) 20%,
                    rgba(200, 100, 255, 0.9) 50%,
                    rgba(120, 50, 255, 0.6) 80%,
                    transparent 100%);
            animation: edgePulse 4s ease-in-out infinite;
        }

        @keyframes edgePulse {

            0%,
            100% {
                opacity: 0.5;
            }

            50% {
                opacity: 1;
                box-shadow: 0 0 20px rgba(180, 80, 255, 0.6);
            }
        }

        /* ── make all dashboard content sit above bg ────────────── */
        .judge-dashboard {
            position: relative;
            z-index: 2;
        }

        /* ── override navbar to match theme ─────────────────────── */
        #app .navbar {
            background: rgba(5, 0, 35, 0.80) !important;
            border-bottom: 1px solid rgba(100, 50, 200, 0.35) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
            box-shadow: 0 2px 30px rgba(60, 0, 160, 0.30) !important;
            position: relative;
            z-index: 100;
        }
    </style>

    <script>
        /* ── tiny star field on the bg canvas ─────────────────────── */
        (function () {
            const canvas = document.getElementById('hd-star-canvas');
            if (!canvas) return;
            const ctx = canvas.getContext('2d');
            let W, H, stars = [];

            const COLORS = ['#ffffff', '#e8d8ff', '#c4a8ff', '#a080ee', '#d0c0ff', '#ffffff'];

            function resize() {
                W = canvas.width = window.innerWidth;
                H = canvas.height = window.innerHeight;
            }

            function seed() {
                stars = [];
                const N = Math.floor((W * H) / 6000);
                for (let i = 0; i < N; i++) {
                    stars.push({
                        x: Math.random() * W,
                        y: Math.random() * H,
                        r: 0.2 + Math.random() * 1.3,
                        a: Math.random(),
                        da: (Math.random() - 0.5) * 0.004,
                        color: COLORS[Math.floor(Math.random() * COLORS.length)],
                    });
                }
            }

            function draw() {
                ctx.clearRect(0, 0, W, H);
                stars.forEach(s => {
                    s.a += s.da;
                    if (s.a > 1) { s.a = 1; s.da = -s.da; }
                    if (s.a < 0) { s.a = 0; s.da = -s.da; }
                    ctx.globalAlpha = s.a * 0.85;
                    ctx.beginPath();
                    ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
                    ctx.fillStyle = s.color;
                    ctx.fill();
                });
                ctx.globalAlpha = 1;
                requestAnimationFrame(draw);
            }

            resize();
            seed();
            draw();
            window.addEventListener('resize', () => { resize(); seed(); });
        })();
    </script>

@endsection