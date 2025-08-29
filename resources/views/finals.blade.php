@extends('layouts.app')

@section('content')

    <style>
        .card {
            background: rgba(219, 5, 5, 0.25);
        }
    </style>

    <div class="container-fluid col-10">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center text-white fw-bold"
                        style="background:rgba(219, 5, 5, 0.33);">
                        <h3 class="text-white d-flex align-items-center text-center fw-bold mt-2"><i
                                class="bi bi-trophy-fill me-2"></i> Final Q & A </h3>
                        <a hx-target="body" hx-get="{{ route('home') }}"
                            class="btn btn-outline-danger bg-white text-danger d-flex align-items-center fw-bold">
                            <i class="bi bi-arrow-left text-danger me-1 fw-bold"></i>Back</a>
                    </div>

                    <h1 class="text-center fw-bold text-white">TOP 5</h1>

                    <h3 class="text-center fw-bold text-white">(Rate: 1.0 - 10.0)</h3>

                    <div class="card-body">

                        <form id="finals-form">
                            @csrf
                            <div class="d-flex flex-row flex-wrap justify-content-center gap-5 mb-5">
                                @foreach($data as $key => $datum)
                                    <div class="card shadow shadow-lg shadow-white" style="width: 15rem;">
                                        <span
                                            class="position-absolute start-0 translate-middle border border-3 border-light rounded-circle text-dark text-center d-flex justify-content-center align-items-center fw-bold fs-3"
                                            style=" background: linear-gradient(135deg, #FFD700, #FFA500, #FFF8DC, #FFD700); width: 40px ;height: 40px ;top:9px">{{ $datum[0] }}</span>
                                        <img src="{{ asset('cons/' . $key + 1 . '.jpg') }}"
                                            class="card-img-top shadow shadow-lg" alt="..."
                                            style="height:200px;object-fit: cover;background-color:#F0EBE3;">
                                        <div
                                            class="card-body d-flex flex-column justify-content-between border-top border-5 border-danger rounded-bottom">
                                            <div>
                                                <p class="card-text text-white m-0">Contestant Name: </p>
                                                <p class="card-title fw-bold text-white m-0">{{ $datum[1] }}</p>

                                            </div>

                                            <div class="">
                                                <p class="card-text m-0 fw-bold text-white fs-5 d-flex align-items-center">
                                                    <i class="bi bi-pen-fill me-1"></i>Score:
                                                </p>
                                                <input class="form-control border border-secondary border-2 fs-4 fw-bold"
                                                    type="number" step="0.1" value="{{ $datum[2] }}" name="{{ $datum[3] }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="text-center text-white fw-semibold mb-3">
                                <i class="bi bi-info-circle me-1"></i>
                                Reminder: Your scores will not be saved until you click <span class="text-white"><i
                                        class="bi bi-floppy-fill me-1"></i>Submit</span>.
                            </div>


                            <div class="floating-button">
                                <button type="submit" value="Submit" class="btn btn-primary btn-lg hadow py-2 px-4 fw-bold">
                                    <i class="bi bi-floppy-fill"></i>&nbsp; Submit
                                </button>
                                <button hidden id="generate-rank" class="btn btn-success btn-lg rounded"><i
                                        class="bi bi-file-earmark-arrow-down-fill  me-2"></i>Generate Rankings</button>
                            </div>

                        </form>


                        <!-- ranking table -->
                        <div id="rank-table-container" class="row justify-content-center my-5" hidden>
                            <div class="col-10 table-responsive">
                                <h4
                                    class="judge-name d-flex justify-content-center text-center align-items-center mt-2 ms-2 fw-bold">
                                    {{ Auth::user()->name }}: {{ Auth::user()->RealName }}
                                </h4>

                                <table class="table table-sm table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col">Rank</th>
                                            <th class="text-center" scope="col">Contestant #</th>
                                            <th class="text-center" scope="col">Contestant Name</th>
                                            <th class="text-center" scope="col">Score</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center" id="rank-table">
                                    </tbody>
                                </table>
                            </div>
                            <div
                                class="sign-container d-flex flex-column justify-content-center text-center align-items-center">
                                <div class="sign border-bottom border-dark border-2 px-3">{{ Auth::user()->name }}:
                                    {{ Auth::user()->RealName }}
                                </div>
                                <div>Signature</div>
                            </div>


                            <div class="d-flex justify-content-center align-items-center mt-3" id="print-btn">
                                <button class="btn btn-warning btn-lg" type="button" value="Print" onclick="printDiv()"><i
                                        class="bi bi-printer-fill"></i> Print</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        function printDiv() {
            var divContents = document.getElementById("rank-table-container").innerHTML;
            var a = window.open('', '', 'height=1000, width=700');
            a.document.write('<html>');
            a.document.write(
                `<head><style>@media print { body { text-align: center; margin-top:50px; } table { margin: 0 auto; border-collapse: collapse; }
                                th, td { padding: 15px; text-align: center; border: 1px solid #000; } h1 { font-size: 44px; } .sign-container { font-size: 14px; margin-top:20px; display:flex; flex-direction:column; align-items:center; }
                                .sign{border-bottom:2px solid black; padding-right:20px; padding-left:20px; width:fit-content; margin-top:15px; } .judge-name { font-size: 25px; margin-top:20px } #print-btn {display:none} }</style></head>`
            );
            a.document.write('<body> <h1>Finals Result<br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

    </script>

    <script type="module">
        $(document).ready(function () {
            // Select all when input text on focused
            $("input[type=number]").on('focus', function (e) {
                e.preventDefault();
                if (e.target) {
                    $(this).select();
                }
            });


            // submit finals grading form
            $('#finals-form').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                // Ajax request
                $.ajax({
                    type: 'POST',
                    url: '{{ route('post_final_form') }}',
                    data: formData,
                    success: function (response) {
                        console.log('Form submitted successfully:', response);
                        Swal.fire({
                            title: "Grading Submitted",
                            text: "Scores saved",
                            icon: "success"
                        });
                        $('#generate-rank').trigger('click');
                    },
                    error: function (error) {
                        const e = error.responseJSON;
                        Swal.fire({
                            title: "Grading Submitted Error",
                            text: JSON.stringify(e),
                            icon: "error"
                        });
                    }
                });

            });

            ///generate ranking
            $('#generate-rank').click(function (event) {
                event.preventDefault();
                // Ajax request
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

                            // Append the new row to the tbody with id 'rank-table'
                            $('#rank-table').append(newRow);
                        });

                        $('#rank-table-container').removeAttr('hidden');
                    },
                    error: function (error) {
                        // Handle error response
                        console.error(error);
                    }
                });

            });
        });
    </script>
@endpush