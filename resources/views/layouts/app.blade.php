<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Binibining Surigay 2025</title>

    <!-- Fonts -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/SDN_LOGO.svg') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Rajdhani:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
            padding: 0.5rem 0;
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

        .cosmic-nav .navbar-toggler {
            border-color: rgba(160, 80, 255, 0.45);
            background: rgba(80, 0, 180, 0.2);
        }
        .cosmic-nav .navbar-toggler-icon {
            filter: invert(1) sepia(1) saturate(5) hue-rotate(220deg);
        }

        .cosmic-nav .nav-user-btn {
            font-family: 'Rajdhani', sans-serif;
            font-weight: 600;
            color: #c4b5fd !important;
            letter-spacing: 0.04em;
            padding: 0.35rem 0.85rem;
            border-radius: 8px;
            border: 1px solid rgba(130, 60, 255, 0.0);
            transition: all 0.25s ease;
        }
        .cosmic-nav .nav-user-btn:hover {
            color: #ffffff !important;
            background: rgba(120, 50, 255, 0.25);
            border-color: rgba(130, 60, 255, 0.45);
            box-shadow: 0 0 14px rgba(130, 60, 255, 0.35);
        }
        .cosmic-nav .nav-user-btn .bi {
            color: #a78bfa;
            font-size: 1.15rem;
        }

        /* dropdown */
        .cosmic-nav .dropdown-menu {
            background: rgba(10, 5, 50, 0.92);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(130, 60, 255, 0.30);
            border-radius: 10px;
            box-shadow: 0 8px 32px rgba(60, 0, 160, 0.45);
            min-width: 180px;
            overflow: hidden;
        }
        .cosmic-nav .dropdown-item {
            font-family: 'Rajdhani', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            color: #f87171;
            letter-spacing: 0.04em;
            padding: 0.6rem 1rem;
            transition: background 0.2s;
        }
        .cosmic-nav .dropdown-item:hover {
            background: rgba(255, 50, 80, 0.15);
            color: #ff6b6b;
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
    </style>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md cosmic-nav">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none" href="#">
                    <img src="{{ URL::asset('../images/surigay_logo.png') }}" alt="Surigay Logo"
                         class="img-fluid" style="width:72px; filter: drop-shadow(0 0 8px rgba(167,139,250,0.6));" onclick="toggleFullScreen()">
                    <span class="nav-brand-title d-none d-sm-block">
                        Grand Coronation Night of the Binibining Surigay 2025
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto"></ul>

                    <ul class="navbar-nav ms-auto align-items-center">
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown"
                                   class="nav-link nav-user-btn dropdown-toggle d-flex align-items-center gap-2"
                                   href="#" role="button" data-bs-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="bi bi-person-circle"></i>
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item d-flex align-items-center gap-2"
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-power"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main id="main-content" class="py-4">
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
