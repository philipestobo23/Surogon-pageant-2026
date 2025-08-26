@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center text-white fw-bold"
                    style="background:#050C9C;">
                    <h3 class="text-white fw-bold fs-4 m-0"><i class="bi bi-person-fill-lock me-1"></i>Admin
                        Operations</h3>
                </div>
                <div class="card-body">
                    <div class="border border-secondary rounded p-4 shadow-lg">
                        <h4 class="fw-bold"><i class="bi bi-star-fill h5 m-1 text-primary"></i>Pre-judge</h4>
                        <button class="btn btn-primary fw-bold" id="preliminary-ranking"><i
                                class="bi bi-clipboard2-data-fill me-1"></i>View Pre-judge Rankings</button>
                        <button class="btn btn-outline-primary" id="preliminary-ranking-close"><i
                                class="bi bi-caret-up-fill"></i></button>

                        <!-- Pre-judgee Categories winner table -->
                        <div class="table-responsive m-2" id="print-preliminary-ranking" hidden>
                            <table class="table table-sm table-striped table-bordered align-middle"
                                id="preliminary-ranking-container">
                                <thead>
                                    <tr class="align-middle text-center">
                                        <th scope="col">Rank</th>
                                        <th scope="col">Total Ranking</th>
                                        <th scope="col">Contestant #</th>
                                        <th scope="col">Contestant Name</th>

                                        <th class="col">Tourism Video</th>
                                        <th scope="col">Ms. Friendship</th>
                                        <th scope="col">Ms. Eloquent</th>
                                        <th class="col">Photogenic</th>
                                        <th class="col">Production Number</th>
                                        <th scope="col">Runway</th>
                                        <th scope="col">White Collection</th>
                                        <th scope="col">Talent</th>
                                        <th scope="col">Essay</th>
                                    </tr>
                                </thead>
                                <tbody id="preliminary-rank-table">
                                </tbody>
                            </table>
                            <div
                                class="sign-container d-flex flex-column justify-content-center text-center align-items-center d-none">
                                <div></div>
                                <div class="sign border-top border-dark border-2 px-3">Signature Over Printed Name
                                </div>
                            </div>
                            <div class="pre-print d-flex justify-content-center align-items-center mt-3">
                                <button class="btn btn-primary" type="button" value="Print" onclick="printDiv()"><i
                                        class="bi bi-printer-fill"></i> Print</button>
                            </div>

                        </div>

                    </div>

                    <!-- coronation -->
                    <div class="border border-secondary rounded p-4 my-5 shadow-lg">
                        <h4 class="fw-bold"><i class="bi bi-star-fill h5 m-1 text-success"></i>Coronation Night</h4>
                        <div class="d-flex">
                            <div class="mx-1">
                                <button class="btn btn-success" id="swimsuit-ranking"><i
                                        class="bi bi-clipboard2-data-fill me-1"></i>Swimwear Rankings</button>
                            </div>

                            <div class="mx-1">
                                <button class="btn btn-success" id="gown-ranking"><i
                                        class="bi bi-clipboard2-data-fill me-1"></i>Formal Wear Rankings</button>
                            </div>

                            <div class="mx-1">
                                <button class="btn btn-success" id="question-ranking"><i
                                        class="bi bi-clipboard2-data-fill me-1"></i>Filipiniana Rankings</button>

                            </div>


                            <div class="mx-1">
                                <button class="btn btn-success" id="production-wear-ranking"><i
                                        class="bi bi-clipboard2-data-fill me-1"></i>Prodcution Wear Rankings</button>
                                <button class="btn btn-outline-success rounded swimsuit-ranking-close" id=""><i
                                        class="bi bi-caret-up-fill"></i></button>
                            </div>

                        </div>

                        <div class="table-responsive m-2" hidden id="swimsuit-ranking-container">
                            <h4 class="fw-bold" id="table-title">Swimsuit Rankings</h4>
                            <table class="table table-sm table-striped table-bordered align-middle">
                                <thead>
                                    <tr class="align-middle text-center">
                                        <th scope="col">Rank</th>
                                        <th scope="col">Contestant #</th>
                                        <th scope="col">Contestant Name</th>
                                        <th scope="col">Overall Rank</th>
                                        <th scope="col">Judge1 Rank</th>
                                        <th scope="col">Judge2 Rank</th>
                                        <th scope="col">Judge3 Rank</th>
                                        <th scope="col">Judge4 Rank</th>
                                        <th scope="col">Judge5 Rank</th>

                                    </tr>
                                </thead>
                                <tbody id="swimsuit-rank-table">
                                </tbody>
                            </table>
                            <div
                                class="sign-container d-flex flex-column justify-content-center text-center align-items-center d-none">
                                <div></div>
                                <div class="sign border-top border-dark border-2 px-3">Signature Over Printed Name
                                </div>
                            </div>
                            <div class="pre-print d-flex justify-content-center align-items-center mt-3">
                                <button class="btn btn-success" type="button" value="Print"
                                    onclick="printCorination()"><i class="bi bi-printer-fill"></i> Print</button>
                            </div>
                        </div>

                        <div clas="d-flex m-5 p-5">
                            <h4 class="fw-bold mt-4"><i class="bi bi-star-fill h5 m-1 text-warning"></i>Coronation
                                Finals</h4>
                            <div>
                                <button class="btn btn-warning fw-bold" id="overall-ranking"><i
                                        class="bi bi-clipboard2-data-fill me-1"></i>View Overall Rankings</button>
                                <button class="btn btn-outline-warning overall-ranking-close fw-bold" id=""><i
                                        class="bi bi-caret-up-fill"></i></button>
                            </div>

                            <div class="table-responsive m-2" hidden id="overall-ranking-container">
                                <table class="table table-sm table-striped table-bordered align-middle">
                                    <thead>
                                        <tr class="align-middle text-center">
                                            <th scope="col">Rank</th>
                                            <th scope="col">Contestant #</th>
                                            <th scope="col">Contestant Name</th>
                                            <th scope="col">Total Rank</th>
                                            <th scope="col">Swimwear Rank</th>
                                            <th scope="col">Formal Wear Rank</th>
                                            <th scope="col">Filipiniana Rank</th>
                                            <th scope="col">Production Wear Rank</th>
                                            <th scope="col" class="bg-primary text-white">Pre-judge Ranking</th>
                                        </tr>
                                    </thead>
                                    <tbody id="overall-rank-table">
                                    </tbody>
                                </table>

                                <div
                                    class="sign-container d-flex flex-column justify-content-center text-center align-items-center d-none">
                                    <div></div>
                                    <div class="sign border-top border-dark border-2 px-3">Signature Over Printed
                                        Name
                                    </div>
                                </div>
                                <div class="pre-print d-flex justify-content-center align-items-center mt-3">
                                    <button class="btn btn-warning" type="button" value="Print"
                                        onclick="printOverAll()"><i class="bi bi-printer-fill"></i>
                                        Print</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Final Event of Surigay -->
                    <div class="border border-secondary rounded p-4 my-2 shadow-lg">
                        <h4 class="fw-bold"><i class="bi bi-star-fill h5 m-1 text-danger"></i>Final Event</h4>

                        <div clas="d-flex m-5 p-5">
                            <div>
                                <button class="btn btn-danger fw-bold" id="final-ranking"><i
                                        class="bi bi-trophy me-2"></i>View Final Ranking</button>
                                <button class="btn btn-outline-danger final-ranking-close fw-bold" id=""><i
                                        class="bi bi-caret-up-fill"></i></button>
                            </div>

                            <div class="table-responsive m-2" hidden id="final-ranking-container">
                                <table class="table table-sm table-striped table-bordered align-middle">
                                    <thead>
                                        <tr class="align-middle text-center">
                                            <th scope="col">Rank</th>
                                            <th scope="col">Contestant #</th>
                                            <th scope="col">Contestant Name</th>
                                            <th scope="col">Total Rank</th>
                                            <th scope="col">Judge1 Rank</th>
                                            <th scope="col">Judge2 Rank</th>
                                            <th scope="col">Judge3 Rank</th>
                                            <th scope="col">Judge4 Rank</th>
                                            <th scope="col">Judge5 Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody id="final-rank-table">
                                    </tbody>
                                </table>
                                <div
                                    class="sign-container d-flex flex-column justify-content-center text-center align-items-center d-none">
                                    <div></div>
                                    <div class="sign border-top border-dark border-2 px-3">Signature Over Printed
                                        Name
                                    </div>
                                </div>
                                <div class="final-print d-flex justify-content-center align-items-center mt-3">
                                    <button class="btn btn-danger" type="button" value="Print"
                                        onclick="printFinal()"><i class="bi bi-printer-fill"></i>
                                        Print</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <footer class="container-fluid py-2 mt-auto" style="width: 100%;">
                    <div class="row img-footer"
                        style="background: url('{{ asset('/images/footer-bg.png') }}') no-repeat center; height:50px;  ">
                    </div>
                    <h6 class="text-center justify-content-center fw-bold m-0 text-muted">Developed By:
                        JCKs-Artisan.Dev</h6>
                </footer>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        function printDiv() {
            var printPreliminaryContents = document.getElementById("print-preliminary-ranking").innerHTML;
            var a = window.open('', '', 'height=1000, width=700');
            a.document.write('<html>');
            a.document.write(
                `<head><style>@media print { body { text-align: center; margin-top:50px; } table { margin: 0 auto; border-collapse: collapse; }
                    th, td { padding: 15px; text-align: center; border: 1px solid #000; } h1 { font-size: 44px; } .sign-container { font-size: 14px; margin-top:20px; display:flex; flex-direction:column; align-items:center; }
                    .sign{border-top:2px solid black; padding-right:20px; padding-left:20px; width:fit-content; margin-top:35px; } .judge-name { font-size: 25px; margin-top:20px } .pre-print{display:none;} }</style></head>`
            );
            a.document.write('<body> <h1>Pre-judged Results<br>');
            a.document.write(printPreliminaryContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

        function printCorination() {
            var printCorinationRank = document.getElementById("swimsuit-ranking-container").innerHTML;
            var a = window.open('', '', 'height=1000, width=700');
            a.document.write('<html>');
            a.document.write(
                `<head><style>@media print { body { text-align: center; margin-top:50px; } table { margin: 0 auto; border-collapse: collapse; }
                    th, td { padding: 15px; text-align: center; border: 1px solid #000; } h1 { font-size: 44px; } .sign-container { font-size: 14px; margin-top:20px; display:flex; flex-direction:column; align-items:center; }
                    .sign{border-top:2px solid black; padding-right:20px; padding-left:20px; width:fit-content; margin-top:35px; } .judge-name { font-size: 25px; margin-top:20px } .pre-print{display:none;} #table-title{font-size:40px; font-weight:bold;} }</style></head>`
            );
            a.document.write('<body><br>');
            a.document.write(printCorinationRank);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

        function printOverAll() {
            var printoverall = document.getElementById("overall-ranking-container").innerHTML;
            var a = window.open('', '', 'height=1000, width=700');
            a.document.write('<html>');
            a.document.write(
                `<head><style>@media print { body { text-align: center; margin-top:50px; } table { margin: 0 auto; border-collapse: collapse; }
                    th, td { padding: 15px; text-align: center; border: 1px solid #000; } h1 { font-size: 44px; } .sign-container { font-size: 14px; margin-top:20px; display:flex; flex-direction:column; align-items:center; }
                    .sign{border-top:2px solid black; padding-right:20px; padding-left:20px; width:fit-content; margin-top:35px; } .judge-name { font-size: 25px; margin-top:20px } .pre-print{display:none;} #table-title{font-size:40px; font-weight:bold;} }</style></head>`
            );
            a.document.write('<body> <h1>Over-all Final Results<br>');
            a.document.write(printoverall);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

        function printFinal() {
            var printFinal = document.getElementById("final-ranking-container").innerHTML;
            var a = window.open('', '', 'height=1000, width=700');
            a.document.write('<html>');
            a.document.write(
                `<head><style>@media print { body { text-align: center; margin-top:50px; } table { margin: 0 auto; border-collapse: collapse; }
                    th, td { padding: 15px; text-align: center; border: 1px solid #000; } h1 { font-size: 44px; } .sign-container { font-size: 14px; margin-top:20px; display:flex; flex-direction:column; align-items:center; }
                    .sign{border-top:2px solid black; padding-right:20px; padding-left:20px; width:fit-content; margin-top:35px; } .judge-name { font-size: 25px; margin-top:20px } .final-print{display:none;} #table-title{font-size:40px; font-weight:bold;} }</style></head>`
            );
            a.document.write(`<body> <h1>Top 5 Final Results<br>`);
            a.document.write(printFinal);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

    </script>
    <script type="module">

        //production rankings
        // $("#production-winner").click(function() {
        //     $.ajax({
        //             type: 'GET',
        //             url: '{{ route('production-winners') }}',
        //             success: function(response) {
        //                 $.each(response.rankedProduction, function(key, value) {
        //                     var newRow = $(`
        //                         <tr>
        //                             <td>${value.rank}</td>
        //                             <td>${value.contestant_number}</td>
        //                             <td>${value.contestant_name}</td>
        //                             <td>${value.total_ranking}</td>
        //                             <td>${value.photogenic}</td>
        //                             <td>${value.advocacy}</td>
        //                             <td>${value.talent}</td>
        //                             <td>${value.friendship}</td>
        //                             <td>${value.production_number}</td>
        //                             <td>${value.modernized_barong}</td>
        //                             <td>${value.prodcution_wear}</td>
        //                             <td>${value.eloquent}</td>
        //                         </tr>`);

        //                     // Append the new row to the tbody with id 'rank-table'
        //                     $('#preliminary-rank-table').append(newRow);
        //                 });

        //                 $('#production-ranking-container').removeAttr('hidden');
        //             },
        //             error: function(error) {
        //                 // Handle error response
        //                 console.error(error);
        //             }
        //         });
        // });


        ///preliminary rankings
        $("#preliminary-ranking-close").click(function() {
            $('#print-preliminary-ranking').attr("hidden", true);
        });

        $("#production-wear-ranking-close").click(function() {
            $('#print-preliminary-ranking').attr("hidden", true);
        });

        $(".overall-ranking-close").click(function() {
            $('#overall-ranking-container').attr("hidden", true);
        });

        $(".swimsuit-ranking-close").click(function() {
            $('#swimsuit-ranking-container').attr("hidden", true);
        });

        $(".final-ranking-close").click(function() {
            $('#final-ranking-container').attr("hidden", true);
        });

        // prejudge grade ranking
        $("#preliminary-ranking").click(function() {
            $.ajax({
                    type: 'GET',
                    url: '{{ route('preliminary_ranking') }}',
                    success: function(response) {
                        console.log(response);
                        $('#preliminary-rank-table').empty();
                        $.each(response.ranking, function(key, value) {
                            console.log(value.row_id);
                            var newRow = $(`
                                <tr class="text-center">
                                    <td>${value.ranking_prejudge}</td>
                                    <td>${value.total_ranking_prejudge}</td>

                                    <td>${value.contestant_number}</td>
                                    <td>${value.contestant_name}</td>

                                    <td>${value.rank_tourism}</td>
                                    <td>${value.rank_friendship}</td>
                                    <td>${value.rank_eloquent}</td>
                                    <td>${value.rank_photogenic}</td>
                                    <td>${value.rank_production_number}</td>
                                    <td>${value.rank_runway}</td>
                                    <td>${value.rank_white_collection}</td>
                                    <td>${value.rank_talent}</td>
                                    <td>${value.rank_essay}</td>
                                </tr>`);

                            // Append the new row to the tbody with id 'rank-table'
                            $('#preliminary-rank-table').append(newRow);
                        });

                        $('#print-preliminary-ranking').removeAttr('hidden');
                    },
                    error: function(error) {
                        // Handle error response
                        console.error(error);
                    }
                });
        });


        ///coronation rankings

        //swimsuit rankings
        $("#swimsuit-ranking").click(function() {
            $.ajax({
                    type: 'GET',
                    url: '{{ route('overall_swimsuit') }}',
                    success: function(response) {
                        console.log(response);
                        $('#swimsuit-rank-table').empty();
                        $.each(response.ranking, function(key, value) {
                            console.log(value.rank_swimsuit);

                            var newRow = $(`
                                <tr class="text-center">
                                    <td>${value.rank_swimsuit}</td>
                                    <td>${value.contestant_number}</td>
                                    <td>${value.contestant_name}</td>
                                    <td>${value.overall_ranking_swimsuit}</td>
                                    <td>${value.Judge1_swimsuit_ranking}</td>
                                    <td>${value.Judge2_swimsuit_ranking}</td>
                                    <td>${value.Judge3_swimsuit_ranking}</td>
                                    <td>${value.Judge4_swimsuit_ranking}</td>
                                    <td>${value.Judge5_swimsuit_ranking}</td>

                                </tr>`);
                            // Append the new row to the tbody with id 'rank-table'
                            $('#swimsuit-rank-table').append(newRow);
                        });
                        $('#table-title').text("Swimwear Ranking")
                        $('#swimsuit-ranking-container').removeAttr('hidden');
                    },
                    error: function(error) {
                        // Handle error response
                        console.error(error);
                    }
                });
        });


        //swimsuit rankings
        $("#gown-ranking").click(function() {
            $.ajax({
                    type: 'GET',
                    url: '{{ route('overall_gown') }}',
                    success: function(response) {
                        console.log(response);
                        $('#swimsuit-rank-table').empty();
                        $.each(response.ranking, function(key, value) {
                            console.log(value.rank_swimsuit);

                            var newRow = $(`
                                <tr class="text-center">
                                    <td>${value.rank_gown}</td>
                                    <td>${value.contestant_number}</td>
                                    <td>${value.contestant_name}</td>
                                    <td>${value.overall_ranking_gown}</td>
                                    <td>${value.Judge1_gown_ranking}</td>
                                    <td>${value.Judge2_gown_ranking}</td>
                                    <td>${value.Judge3_gown_ranking}</td>
                                    <td>${value.Judge4_gown_ranking}</td>
                                    <td>${value.Judge5_gown_ranking}</td>

                                </tr>`);
                            // Append the new row to the tbody with id 'rank-table'
                            $('#swimsuit-rank-table').append(newRow);
                        });
                        $('#table-title').text("Formal Wear Ranking")
                        $('#swimsuit-ranking-container').removeAttr('hidden');
                    },
                    error: function(error) {
                        // Handle error response
                        console.error(error);
                    }
                });
        });


        $("#question-ranking").click(function() {
            $.ajax({
                    type: 'GET',
                    url: '{{ route('overall_question') }}',
                    success: function(response) {
                        console.log(response);
                        $('#swimsuit-rank-table').empty();
                        $.each(response.ranking, function(key, value) {
                            var newRow = $(`
                                <tr class="text-center">
                                    <td>${value.rank_question}</td>
                                    <td>${value.contestant_number}</td>
                                    <td>${value.contestant_name}</td>
                                    <td>${value.overall_ranking_question}</td>
                                    <td>${value.Judge1_question_ranking}</td>
                                    <td>${value.Judge2_question_ranking}</td>
                                    <td>${value.Judge3_question_ranking}</td>
                                    <td>${value.Judge4_question_ranking}</td>
                                    <td>${value.Judge5_question_ranking}</td>

                                </tr>`);
                            // Append the new row to the tbody with id 'rank-table'
                            $('#swimsuit-rank-table').append(newRow);
                        });
                        $('#table-title').text("Filipiniana Ranking")
                        $('#swimsuit-ranking-container').removeAttr('hidden');
                    },
                    error: function(error) {
                        // Handle error response
                        console.error(error);
                    }
                });
        });


        $("#production-wear-ranking").click(function() {
            $.ajax({
                    type: 'GET',
                    url: '{{ route('overall_production_wear') }}',
                    success: function(response) {
                        console.log(response);
                        $('#swimsuit-rank-table').empty();
                        $.each(response.ranking, function(key, value) {
                            console.log(value.rank_production_wear);

                            var newRow = $(`
                                <tr class="text-center">
                                    <td>${value.rank_production_wear}</td>
                                    <td>${value.contestant_number}</td>
                                    <td>${value.contestant_name}</td>
                                    <td>${value.overall_ranking_production_wear}</td>
                                    <td>${value.Judge1_production_wear_ranking}</td>
                                    <td>${value.Judge2_production_wear_ranking}</td>
                                    <td>${value.Judge3_production_wear_ranking}</td>
                                    <td>${value.Judge4_production_wear_ranking}</td>
                                    <td>${value.Judge5_production_wear_ranking}</td>

                                </tr>`);
                            // Append the new row to the tbody with id 'rank-table'
                            $('#swimsuit-rank-table').append(newRow);
                        });
                        $('#table-title').text("Production Wear Ranking")
                        $('#swimsuit-ranking-container  ').removeAttr('hidden');
                    },
                    error: function(error) {
                        // Handle error response
                        console.error(error);
                    }
                });
        });

        $("#overall-ranking").click(function() {
            $.ajax({
                    type: 'GET',
                    url: '{{ route('overall_final') }}',
                    success: function(response) {
                        console.log(response);
                        $('#overall-rank-table').empty();
                        $.each(response.ranking, function(key, value) {
                            var newRow = $(`
                                <tr class="text-center">
                                    <td>${value.overall_ranking}</td>
                                    <td>${value.contestant_number}</td>
                                    <td>${value.contestant_name}</td>
                                    <td>${value.total_ranking}</td>
                                    <td>${value.rank_swimsuit}</td>
                                    <td>${value.rank_gown}</td>
                                    <td>${value.rank_question}</td>
                                    <td>${value.rank_production_wear}</td>
                                    <td class="bg-primary text-white">${value.total_ranking_prejudge}</td>
                                </tr>`);
                            // Append the new row to the tbody with id 'rank-table'
                            $('#overall-rank-table').append(newRow);
                        });
                        $('#overall-ranking-container').removeAttr('hidden');
                    },
                    error: function(error) {
                        // Handle error response
                        console.error(error);
                    }
                });
        });

        $("#final-ranking").click(function() {
            $.ajax({
                    type: 'GET',
                    url: '{{ route('overall_winner') }}',
                    success: function(response) {
                        console.log(response);
                        $('#final-rank-table').empty();
                        $.each(response.ranking, function(key, value) {
                            var newRow = $(`
                                <tr class="text-center">
                                    <td>${value.rank_final}</td>
                                    <td>${value.contestant_number}</td>
                                    <td>${value.contestant_name}</td>
                                    <td>${value.overall_ranking_final}</td>
                                    <td>${value.Judge1_final_ranking}</td>
                                    <td>${value.Judge2_final_ranking}</td>
                                    <td>${value.Judge3_final_ranking}</td>
                                    <td>${value.Judge4_final_ranking}</td>
                                    <td>${value.Judge5_final_ranking}</td>

                                </tr>`);
                            // Append the new row to the tbody with id 'rank-table'
                            $('#final-rank-table').append(newRow);
                        });
                        $('#final-ranking-container').removeAttr('hidden');
                    },
                    error: function(error) {
                        // Handle error response
                        console.error(error);
                    }
                });
        });





    </script>
@endpush
