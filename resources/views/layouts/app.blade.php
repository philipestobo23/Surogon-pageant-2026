<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Binibining Surigay 2025</title>

    <!-- Fonts -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/SDN_LOGO.png') }}" />

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
            font-size: 1.5rem; /* Adjust icon size */
        }
    </style>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background:rgba(75, 80, 81, 0.34);">
            <div class="container">
            <img src="{{ URL::asset('../images/surigay_logo.png') }}" alt=" "
            class="img-fluid mb-0 pb-0 me-3" style="width:90px" onclick="toggleFullScreen()">
                <span class="fw-bold text-white fs-6">
                    Grand Coronation Night of the Binibining Surigay 2025
                </span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        {{-- @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @endguest --}}
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="bi bi-person-circle fs-4 p-1 me-2"></i> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item fw-bold text-danger d-flex align-items-center" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="bi bi-power me-1"></i>
                                        {{ __('Logout') }}
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
