@extends('layouts.app')

@section('content')


<div hx-boost="true" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-8">
            <div class="card-container">
                <div class="card">
                    <div id="home" class="card-header text-white d-flex align-items-center fs-4 fw-bold">
                        <h3 class="card-title text-center fw-bold d-flex align-items-center mt-2"
                            style="color:#0A4D68;"> <i class="bi bi-person-heart m-1" style="color:#0A4D68;"></i>
                            Current Judge: {{ Auth::user()->RealName }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column  gap-2 mb-3 border p-4 rounded shadow">
                            <label for="" class="h4 align-items-center fw-bold">
                                <i class="bi bi-star-fill m-1" style="color:#E90074;"></i> Coronation Night
                            </label>
                            <div class="d-flex flex-column flex-wrap flex-md-row gap-2">
                                <a href="{{ route('swimsuit_form') }}"
                                    class="btn btn-lg shadow fw-bold text-white rounded-pill"
                                    style="background:#624E88;">
                                    <i class="bi bi-hearts me-2 fs-4"></i>Swimwear
                                </a>
                                <a href="{{ route('gown_form') }}"
                                    class="btn btn-lg shadow fw-bold text-white rounded-pill"
                                    style="background:#8967B3;">
                                    <i class="bi bi-suit-heart-fill me-2 fs-4"></i> Formal Wear
                                </a>
                                <a href="{{ route('question_form') }}"
                                    class="btn btn-lg shadow fw-bold text-white rounded-pill"
                                    style="background:#CB80AB;">
                                    <i class="bi bi-flag-fill me-2 fs-4"></i> Filipiniana
                                </a>

                                <a href="{{ route('production_wear_form') }}"
                                    class="btn btn-lg shadow fw-bold text-white rounded-pill"
                                    style="background:#667BC6;">
                                    <i class="bi bi-star-fill me-2 fs-4"></i> Production Wear


                                </a>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-2 mb-3 border p-4 rounded shadow">
                            <label for="" class="h4 align-items-center fw-bold">
                                <i class="bi bi-star-fill h4 m-1 text-danger"></i> Final Placement
                            </label>
                            <div class="d-flex flex-column flex-md-row gap-2">
                                <a href="{{ route('final_form') }}"
                                    class="btn btn-danger btn-lg shadow fw-bold rounded-pill">
                                    <i class="bi bi-trophy-fill me-1 fs-4"></i> Final Q & A
                                </a>
                            </div>
                        </div>

                        <marquee class="fw-bolder fs-4 p-1 shadow text-white" behavior="scroll" direction="left"
                            style="background-color:#7E60BF;">
                            <i class="bi bi-star-fill"></i> Grand Coronation Night of
                            the Kababajinhang Surogon 2024 <i class="bi bi-star-fill"></i> &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; <i class="bi bi-star-fill"></i> Rainbow Connection Surigao Del Norte
                            <i class="bi bi-star-fill"></i>&nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; <i class="bi bi-star-fill"></i> Provincial Government of Surigao Del Norte
                            <i class="bi bi-star-fill"></i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; <i class="bi bi-star-fill"> Provincial Information and Communications
                            Technology Unit (PICTU) </i> <i class="bi bi-star-fill"></i>
                        </marquee>

                    </div>
                    <footer class="container-fluid py-2 mt-auto" style="width: 100%;">
                        <div class="row img-footer"
                            style="background: url('{{ asset('/images/footer-bg.png') }}');background-repeat:no-repeat; height:45px; background-position:center;   ">
                        </div>
                        <h6 class="text-center justify-content-center m-0 text-muted">Developed By: Provicial ICT Unit
                            JCKs-Artisan.Dev</h6>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection