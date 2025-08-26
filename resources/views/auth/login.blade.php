@extends('layouts.app')

@section('title', 'Baganing Solibao')

@section('content')
<!-- Section: Design Block -->
<section class="overflow-hidden position-relative d-flex align-items-center" style="min-height: 80vh">
    <div class="container px-4 text-center text-lg-start sm-my-1">

        <div class="row gx-lg-5 align-items-center mb-5">

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative rounded d-flex justify-content-center flex-column  align-items-center "
                style="z-index: 10">

                <img src="{{ asset('images/logo.png') }}" alt=" "
                    class="mt-2 img-fluid mb-0 pb-0 rounded-circle zoomable-image" style="width:300px">

                <h1 class="mt-4 my-2 fw-bold text-center" style="color:#F3C623">

                    Kababajinhang Surogon <br> 2024

                </h1>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">


                <div class="card bg-glass">

                    <div class="card-body py-5">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Email input -->
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end text-dark fw-bold fs-5"><i
                                        class="bi bi-person-fill p-1"></i>{{ __('Email:') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control border border-dark @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Password input -->
                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end text-dark fw-bold fs-5"><i
                                        class="bi bi-lock-fill p-1"></i>{{ __('Password:') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control border border-dark @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Remember me button -->
                            <div class="row mb-3">
                                <div class="col d-flex justify-content-center">
                                    <div class="form-check">
                                        <input class="form-check-input border border-dark" type="checkbox"
                                            name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-dark" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit button -->

                            <div class="row mx-5 rounded justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg col-8 rounded-pill"><i
                                        class="bi bi-box-arrow-in-right p-1"></i>
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
