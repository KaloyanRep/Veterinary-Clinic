{{--@extends('layouts.master')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <h1>Clinics</h1>--}}
{{--        <table id="clinics-table" class="table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>#</th>--}}
{{--                <th>Name</th>--}}
{{--                <th>Type</th>--}}
{{--                <th>Address</th>--}}
{{--                <!-- Add more columns if needed -->--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            <!-- Table body will be populated dynamically by JavaScript -->--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}

{{--    <!-- Include jQuery -->--}}
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}

{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            // Fetch clinics data via AJAX--}}
{{--            $.ajax({--}}
{{--                url: "{{ route('clinics.index') }}",--}}
{{--                method: "GET",--}}
{{--                dataType: "json",--}}
{{--                success: function(response) {--}}
{{--                    if(response) {--}}
{{--                        var clinics = response.data;--}}
{{--                        var html = '';--}}
{{--                        // Loop through clinics data and populate the table rows--}}
{{--                        $.each(clinics, function(index, clinic) {--}}
{{--                            html += '<tr>';--}}
{{--                            html += '<td>' + clinic.id + '</td>';--}}
{{--                            html += '<td>' + clinic.name + '</td>';--}}
{{--                            html += '<td>' + clinic.type + '</td>';--}}
{{--                            html += '<td>' + clinic.address + '</td>';--}}
{{--                            // Add more columns if needed--}}
{{--                            html += '</tr>';--}}
{{--                        });--}}
{{--                        // Append HTML to the table body--}}
{{--                        $('#clinics-table tbody').html(html);--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function(xhr, status, error) {--}}
{{--                    console.error(xhr.responseText);--}}
{{--                    // Optionally handle errors here--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
