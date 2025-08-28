@extends('layouts.app')

@section('title', 'Baganing Solibao')

@section('content')
    <section class="d-flex justify-content-center align-items-center vh-80">
        <div class="text-center">

            <!-- Logo on top -->
            <div class="mb-1">
                <img src="{{ asset('images/surigay_logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 420px;">
            </div>

            <!-- Futuristic Login Form -->
            <div class="card bg-transparent border-0 shadow-0 mx-auto" style="max-width: 400px;">
                <div class="card-body p-1">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email input -->
                        <div class="mb-4 text-start">
                            <label for="email" class="form-label text-neon fw-bold">
                                <i class="bi bi-person-fill me-2"></i>Email
                            </label>
                            <input id="email" type="email"
                                class="form-control cyber-input @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="mb-4 text-start">
                            <label for="password" class="form-label text-neon fw-bold">
                                <i class="bi bi-lock-fill me-2"></i>Password
                            </label>
                            <input id="password" type="password"
                                class="form-control cyber-input @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Remember me -->
                        <!-- <div class="form-check text-center mb-4">
                            <input class="form-check-input border-dark" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-light" for="remember">
                                Remember Me
                            </label>
                        </div> -->

                        <!-- Submit -->
                        <div class="text-center">
                            <button type="submit" class="btn cyber-btn px-5 py-2">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Login
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>

    <style>
        .neon-logo {
            box-shadow: 0 0 15px #00eaff, 0 0 30px #00eaff;
        }

        .text-neon {
            color: #ffffffff;
        }



        .cyber-input:focus {
            border-color: #00c8ffff;
            box-shadow: 0 0 10px #1ce4f6ff, 0 0 20px #1ce4f6ff;
        }

        .cyber-btn {
            background: #11c0d0ff;
            border: 2px solid #00eaff;
            color: #000000ff;
            font-weight: bold;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
            border-color: #01c8ffff;
        }

        .cyber-btn:hover {
            background: #00eaff;
            color: #000;
            box-shadow: 0 0 15px #00eaff, 0 0 30px #00eaff;
        }
    </style>
@endsection