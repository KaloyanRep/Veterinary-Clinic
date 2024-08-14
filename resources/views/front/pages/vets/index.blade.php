@extends('layouts.master')

@section('content')

    {{-- Display success messages --}}
    @if (session('success'))
        <div class="alert alert-success" id="successAlert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('vets.create') }}" class="nav-link">New Vet</a>

    <div class="container" id="table-vets">
        @include('front.pages.vets.partials.vet_table')
    </div>

@endsection

@section('javascripts')

    @parent

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to fetch data via AJAX request
            function fetchData(url) {
                $.ajax({
                    url: url,
                    type: "GET",
                    data: $('#filterForm').serialize(), // Serialize form data
                    success: function (response) {
                        $('#table-vets').empty();
                        $("#table-vets").html(response.view);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Initial data fetch when the page loads
            let initialUrl = "{{ route('vets') }}";
            fetchData(initialUrl);

            // Handle pagination links via AJAX
            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                let url = $(this).attr('href');
                fetchData(url);
            });

            // Handle form submission for filtering
            $('#filterForm').submit(function (event) {
                event.preventDefault(); // Prevent default form submission
                let url = $(this).attr('action');
                fetchData(url);
            });
        });


    </script>

@endsection
