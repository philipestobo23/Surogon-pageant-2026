@extends('layouts.app')

@section('content')

<style>
body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('{{ asset('images/surigay25_bg.webp') }}') no-repeat center center fixed;
            background-size: cover;
        }
</style>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center text-white fw-bold"
                    style="background:#050C9C;">
                    <h3 class="text-white text-center fw-bold mt-2">  <i class="bi bi-list-ul"></i> Production Event Grading</h3>
                    <a href="{{ route('home') }}" class="btn btn-outline-danger bg-white text-danger align-items-center h2 m-1 px-4"><i class="bi bi-backspace-fill text-danger"></i>Back </a>
                </div>
                <div class="card-body">
                    <form id="production-form">
                        @csrf
                        <table class="table table-sm table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Contestant #</th>
                                    <th class="text-center" scope="col">Contestant Name</th>
                                    <th class="text-center" scope="col">Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $datum)
                                    <tr>
                                        <th class="text-center" scope="row">
                                            <div class="btn btn-primary rounded-circle py-1">{{ $datum[0] }}</div>
                                        </th>
                                        <td class="text-center"> {{ $datum[1] }} </td>
                                        <td class="text-center">
                                            <input type="text" value="{{ $datum[2] }}" name="{{ $datum[0] }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>



                        <div class="d-flex justify-content-end">
                            <button type="submit" value="Submit" class="btn btn-primary btn-lg m-1"><i class="bi bi-floppy-fill m-1"> Submit</i></button>
                            <button id="generate-rank" class="btn btn-success btn-lg rounded m-1"><i class="bi bi-file-earmark-arrow-down-fill"></i> Generate Rankings</button>
                        </div>

                    </form>

                    <!-- ranking table -->
                    <div id="rank-table-container" class="row justify-content-center my-5" hidden>
                        <div class="col-10 table-responsive">
                            <table class="table table-sm table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Rank</th>
                                        <th scope="col">Contestant #</th>
                                        <th scope="col">Contestant Name</th>
                                        <th scope="col">Score</th>
                                    </tr>
                                </thead>
                                <tbody id="rank-table">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {

            // submit grading form
            $('#production-form').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                // Ajax request
                $.ajax({
                    type: 'POST',
                    url: '{{ route('postProductionGrading') }}',
                    data: formData,
                    success: function(response) {
                        console.log('Form submitted successfully:', response);
                        Swal.fire({
                            title: "Grading Submitted",
                            text: "Scores saved",
                            icon: "success"
                        });
                    },
                    error: function(error) {
                        alert(error.responseText)
                    }
                });

            });

            ///generate ranking
            $('#generate-rank').click(function(event) {
                event.preventDefault();
                // Ajax request
                $('#rank-table').empty();
                $.ajax({
                    type: 'GET',
                    url: '{{ route('rank_swimsuit') }}',
                    success: function(response) {
                        $.each(response.rankings, function(key, value) {
                            console.log(value.ranking);
                            // var newRow = $(`
                            //     <tr>
                            //         <td>${value.ranking}</td>
                            //         <td>${value.contestant_number}</td>
                            //         <td>${value.contestant_name}</td>
                            //         <td>${value.score}</td>
                            //     </tr>`);

                            // // Append the new row to the tbody with id 'rank-table'
                            // $('#rank-table').append(newRow);
                        });

                        $('#rank-table-container').removeAttr('hidden');
                    },
                    error: function(error) {
                        // Handle error response
                        console.error(error);
                    }
                });

            });
        });
    </script>


@endpush
