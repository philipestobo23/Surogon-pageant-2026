@extends('layouts.app')

@section('content')

    <div hx-boost="true" class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9">

                <div class="card border-0 shadow-lg text-light rounded-4 overflow-hidden">

                    <!-- Header -->
                    <div id="home" class="card-header border-0 text-center py-3 bg-gradient-cyber">
                        <h3 class="fw-bold neon-text m-0">
                            <i class="bi bi-person-heart me-2"></i>
                            Current Judge: {{ Auth::user()->RealName }}
                        </h3>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <!-- Coronation Night -->
                        <div class="mb-4 p-4 rounded-4 glass-panel">
                            <label class="h4 fw-bold text-neon">
                                <i class="bi bi-star-fill me-2"></i>Coronation Night
                            </label>
                            <div class="d-flex flex-wrap gap-3 mt-3">
                                <a href="{{ route('swimsuit_form') }}" class="btn btn-lg neon-btn-1 rounded-pill flex-fill">
                                    <i class="bi bi-hearts me-2 fs-5"></i> Swimwear
                                </a>
                                <a href="{{ route('gown_form') }}" class="btn btn-lg neon-btn-2 rounded-pill flex-fill">
                                    <i class="bi bi-suit-heart-fill me-2 fs-5"></i>Gown
                                </a>
                                <a href="{{ route('production_wear_form') }}" class="btn btn-lg neon-btn-3 rounded-pill flex-fill">
                                    <i class="bi bi-flag-fill me-2 fs-5"></i> Filipiniana Wear
                                </a>
                                
                            </div>
                        </div>

                        <!-- Final Placement -->
                        <div class="mb-4 p-4 rounded-4 glass-panel">
                            <label class="h4 fw-bold text-danger">
                                <i class="bi bi-star-fill me-2"></i> Final Placement
                            </label>
                            <div class="mt-3">
                                <a href="{{ route('final_form') }}" class="btn neon-btn-danger btn-lg rounded-pill px-4">
                                    <i class="bi bi-trophy-fill me-2 fs-5"></i> Final Q & A
                                </a>
                            </div>
                        </div>

                        <!-- Scrolling marquee -->
                        <div class="marquee-container py-2">
                            <div class="marquee-text fw-bold">
                                <i class="bi bi-star-fill"></i> Grand Coronation Night of the Binibining Surigay 2025
                                <i class="bi bi-star-fill mx-4"></i> Rainbow Connection Surigao Del Norte
                                <i class="bi bi-star-fill mx-4"></i> Provincial Government of Surigao Del Norte
                                <i class="bi bi-star-fill mx-4"></i> Provincial Information and Communications Technology
                                Office (PICTO)
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <footer class="py-1 text-center">
                        <div class="d-flex justify-content-center align-items-center flex-wrap gap-3">
                            <img src="{{ URL::asset('../images/PICTO_LOGO.png') }}" alt="Left Logo"
                                class="img-fluid neon-logo" style="max-height:50px;">
                            <h5 class="m-0 small text-light">
                                Developed By: <span class="text-neon">Provincial ICT Office</span> | JCKs-Artisan.Dev
                            </h5>
                            <img src="{{ URL::asset('../images/SDN_LOGO.png') }}" alt="Right Logo"
                                class="img-fluid neon-logo" style="max-height:50px;">
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            background: rgba(75, 80, 81, 0.34);
       
        }

        /* Neon header */
        .bg-gradient-cyber {
            background: linear-gradient(90deg, #0A4D68, #00131c);
        }

        .neon-text {
            color: #00eaff;
            text-shadow: 0 0 5px #00eaff, 0 0 15px #00eaffb4;
        }

        /* Glass panels */
        .glass-panel {
            background: rgba(255, 255, 255, 0.17);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        /* Neon buttons */
        .neon-btn-1 {
            background: transparent;
            border: 4px solid #624E88;
            color: #fff;
        }

        .neon-btn-1:hover {
            background: #624E88;
            box-shadow: 0 0 15px #624E88;
        }

        .neon-btn-2 {
            background: transparent;
            border: 2px solid #8967B3;
            color: #fff;
        }

        .neon-btn-2:hover {
            background: #8967B3;
            box-shadow: 0 0 15px #8967B3;
        }

        .neon-btn-3 {
            background: transparent;
            border: 2px solid #CB80AB;
            color: #fff;
        }

        .neon-btn-3:hover {
            background: #CB80AB;
            box-shadow: 0 0 15px #CB80AB;
        }

        .neon-btn-4 {
            background: transparent;
            border: 2px solid #667BC6;
            color: #fff;
        }

        .neon-btn-4:hover {
            background: #667BC6;
            box-shadow: 0 0 15px #667BC6;
        }

        .neon-btn-danger {
            border: 2px solid #E90074;
            background: transparent;
            color: #fff;
        }

        .neon-btn-danger:hover {
            background: #E90074;
            box-shadow: 0 0 20px #E90074;
        }

        /* Logo glow */
        .neon-logo {
            filter: drop-shadow(0 0 8px #00eaff);
        }

        /* Marquee */
        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            background: #00131c;
            border-top: 1px solid #00eaff;
            border-bottom: 1px solid #00eaff;
        }

        .marquee-text {
            display: inline-block;
            padding-left: 100%;
            animation: marquee 25s linear infinite;
            color: #fff;
        }

        @keyframes marquee {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>



@endsection