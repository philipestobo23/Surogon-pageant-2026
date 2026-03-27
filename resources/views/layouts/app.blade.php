<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kababajinhang Surogon 2026</title>

    <!-- Fonts -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/SDN_LOGO.svg') }}" />

    <style>
        .floating-button {
            position: fixed;
            bottom: 20px; /* Distance from bottom */
            right: 20px; /* Distance from right */
            z-index: 1000; /* Ensure it's above other elements */
        }

        .floating-button button {
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        }

        .floating-button button i {
            font-size: 1.5rem;
        }

        /* ── Cosmic Navbar ── */
        body {
            background: #050023;
        }

        .cosmic-nav {
            position: relative;
            z-index: 200;
            background: rgba(5, 0, 35, 0.55) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
            border-bottom: 1px solid rgba(130, 60, 255, 0.25) !important;
            box-shadow: 0 2px 40px rgba(80, 0, 200, 0.20), inset 0 -1px 0 rgba(160, 80, 255, 0.15) !important;
            padding: 0.35rem 0;
        }

        .cosmic-nav .nav-brand-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            background: linear-gradient(90deg, #c8aaff, #a78bfa, #e0c3fc, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: none;
        }

        /* ── User dropdown button ── */
        .nav-user-btn {
            font-family: 'Rajdhani', sans-serif;
            font-weight: 600;
            font-size: 0.88rem;
            color: #c4b5fd;
            letter-spacing: 0.04em;
            background: rgba(80, 0, 180, 0.12);
            border: 1px solid rgba(130, 60, 255, 0.28);
            border-radius: 8px;
            padding: 0.3rem 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.45rem;
            transition: all 0.22s ease;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .nav-user-btn:hover, .nav-user-btn:focus,
        .nav-user-btn.show {
            color: #e9d5ff;
            background: rgba(100, 20, 220, 0.28);
            border-color: rgba(160, 80, 255, 0.55);
            box-shadow: 0 0 14px rgba(130, 60, 255, 0.30);
        }
        .nav-user-btn .bi-person-circle {
            color: #a78bfa;
            font-size: 1.1rem;
            flex-shrink: 0;
        }
        .nav-user-btn::after {
            margin-left: auto;
            flex-shrink: 0;
        }
        .nav-user-name {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        /* ── Dropdown panel ── */
        .nav-user-dropdown {
            background: rgba(8, 3, 45, 0.96);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(130, 60, 255, 0.32);
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(50, 0, 150, 0.50);
            min-width: 170px;
            padding: 0.35rem 0;
            overflow: hidden;
        }
        .nav-user-dropdown .dropdown-item {
            font-family: 'Rajdhani', sans-serif;
            font-weight: 700;
            font-size: 0.92rem;
            color: #f87171;
            letter-spacing: 0.05em;
            padding: 0.55rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: background 0.18s;
        }
        .nav-user-dropdown .dropdown-item:hover {
            background: rgba(255, 50, 80, 0.16);
            color: #fca5a5;
        }
        .nav-user-dropdown .dropdown-item .bi {
            font-size: 1rem;
        }

        /* accent line at very top */
        .cosmic-nav::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #7c3aed, #a78bfa, #7c3aed, transparent);
            opacity: 0.8;
        }

        /* ── Brand title truncation ── */
        .nav-brand-title {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            max-width: clamp(120px, 38vw, 480px);
        }

        /* ── Landscape phone: ultra compact ── */
        @media (orientation: landscape) and (max-height: 500px) {
            .cosmic-nav { padding: 0.15rem 0; }
            .cosmic-nav img { width: 36px !important; }
            .nav-brand-title { font-size: 0.65rem !important; max-width: 26vw; }
            .nav-user-name { max-width: 80px; font-size: 0.78rem !important; }
            #main-content { padding-top: 0.4rem !important; padding-bottom: 0.4rem !important; }
        }

        /* ── Tablet landscape ── */
        @media (min-width: 768px) and (orientation: landscape) {
            .cosmic-nav { padding: 0.25rem 0; }
            .nav-brand-title { font-size: 0.76rem; max-width: 42vw; }
            #main-content { padding-top: 0.6rem !important; padding-bottom: 0.6rem !important; }
        }
    </style>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body hx-boost="true">
    <div id="app">
        <nav class="navbar navbar-expand cosmic-nav">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none" href="#">
                    <img src="{{ URL::asset('../images/surogon2026.png') }}" alt="Surogon Logo"
                         class="img-fluid" style="width:80px; flex-shrink:0; filter: drop-shadow(0 0 8px rgba(167,139,250,0.6));" onclick="toggleFullScreen()">
                    <span class="nav-brand-title d-none d-sm-block">
                        Grand Coronation Night of the Kababajinhang Surogon 2026
                    </span>
                </a>

                @auth
                <div class="ms-auto flex-shrink-0 dropdown">
                    <button class="nav-user-btn dropdown-toggle" type="button"
                            id="userDropdown" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                        <span class="nav-user-name">{{ Auth::user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end nav-user-dropdown" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                @endauth
            </div>
        </nav>

        <main id="main-content" class="py-2 py-md-3">
            @yield('content')
        </main>

    </div>


@stack('scripts')
<script>
    function toggleFullScreen() {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen();
        } else if (document.exitFullscreen) {
            document.exitFullscreen();
        }
    }
</script>
</body>
</html>
