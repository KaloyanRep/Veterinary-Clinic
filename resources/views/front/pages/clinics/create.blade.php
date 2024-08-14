@extends('layouts.master')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add new Clinic
    </button>

    <!-- Filter Dropdown -->
    <div class="mb-3">
        <label for="typeFilter" class="form-label">Filter by Type</label>
        <select id="typeFilter" class="form-control">
            <option value="">All Types</option>
            <option value="orthopedics">Orthopedics</option>
            <option value="pediatrics">Pediatrics</option>
            <option value="dermatology">Dermatology</option>
            <option value="cardiology">Cardiology</option>
            <option value="neurology">Neurology</option>
            <option value="gynecology">Gynecology</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <h2>Total Clinics({{ $clinics->total() }})</h2>

    <!-- Modal -->
    <div class="modal fade ajax-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form id="ajaxForm">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Create Clinic</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                            <span id="nameError" class="text-danger error-messages"></span>
                        </div>
                        <div class="form-group mb-1">
                            <label for="type">Type</label>
                            <select name="type" id="typeFilter" class="form-control custom-select">
                                <option disabled selected>Choose Option</option>
                                <option value="orthopedics">Orthopedics</option>
                                <option value="pediatrics">Pediatrics</option>
                                <option value="dermatology">Dermatology</option>
                                <option value="cardiology">Cardiology</option>
                                <option value="neurology">Neurology</option>
                                <option value="gynecology">Gynecology</option>
                            </select>
                            <span id="typeError" class="text-danger error-messages"></span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control">
                            <span id="addressError" class="text-danger error-messages"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveBtn">Save Clinic</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <table id="clinics-table" class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Address</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if ($clinics->count() > 0)
            @foreach($clinics as $index => $clinic)
                <tr>
                    <td>{{ ($clinics->currentPage() - 1) * $clinics->perPage() + $index + 1 }}</td>
                    <td>{{$clinic->name}}</td>
                    <td>{{$clinic->type}}</td>
                    <td>{{$clinic->address}}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">No query results found</td>
            </tr>
        @endif
        </tbody>
    </table>

    <div id="pagination-links">
        {{ $clinics->links() }}
    </div>

    <script>
        $(document).ready(function () { //тест
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Fetch clinics data when the page loads
            fetchClinicsData();

            // Event listener for the filter dropdown
            $('#typeFilter').change(function() {
                fetchClinicsData();
            });

            // Function to fetch clinics data and populate the table
            function fetchClinicsData(page = 1) {
                var selectedType = $('#typeFilter').val();

                $.ajax({
                    url: "{{ route('clinics') }}",
                    type: "GET",
                    data: { page: page, type: selectedType },
                    success: function (response) {
                        $('#clinics-table tbody').empty();
                        $.each(response.data.data, function (index, clinic) {
                            var row = '<tr>' +
                                '<td>' + ((response.data.current_page - 1) * response.data.per_page + index + 1) + '</td>' +
                                '<td>' + clinic.name + '</td>' +
                                '<td>' + clinic.type + '</td>' +
                                '<td>' + clinic.address + '</td>' +
                                '<td>' +
                                '<a href="#" class="btn btn-success btn-show" data-id="' + clinic.id + '">Show</a>' +
                                '<a href="#" class="btn btn-info btn-edit" data-id="' + clinic.id + '">Edit</a>' +
                                '<a href="#" class="btn btn-danger btn-delete" data-id="' + clinic.id + '">Delete</a>' +
                                '</td>' +
                                '</tr>';
                            $('#clinics-table tbody').append(row);
                        });

                        $('#pagination-links').html(response.links);

                        $('#pagination-links a').on('click', function (e) {
                            e.preventDefault();
                            var page = $(this).attr('href').split('page=')[1];
                            fetchClinicsData(page);
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            $('#typeFilter').change(function() {
                fetchClinicsData();
            });

            fetchClinicsData();

            // Event listener for Show button
            $(document).on('click', '.btn-show', function (e) {
                e.preventDefault();
                var clinicId = $(this).data('id');
                window.location.href = "{{ url('clinics/show') }}/" + clinicId;
            });

            // Event listener for Edit button
            $(document).on('click', '.btn-edit', function (e) {
                e.preventDefault();
                var clinicId = $(this).data('id');
                window.location.href = "{{ url('clinics/edit') }}/" + clinicId;
            });

            // Event listener for Delete button
            $(document).on('click', '.btn-delete', function (e) {
                e.preventDefault();
                var clinicId = $(this).data('id');
                if (confirm("Are you sure you want to delete this clinic?")) {
                    $.ajax({
                        url: "{{ url('clinics/delete') }}/" + clinicId,
                        type: 'DELETE',
                        success: function (response) {
                            fetchClinicsData();
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });

            // Event listener for saving clinic data
            $('#saveBtn').click(function () {
                var form = $('#ajaxForm')[0];
                var formData = new FormData(form);

                $.ajax({
                    url: '{{ route("clinics.store") }}',
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (response) {
                        $('.ajax-modal').modal('hide');
                        swal("Success!", response.success, "success");

                        // Fetch and prepend newly created clinic to the table
                        fetchNewlyCreatedClinic(response.data);
                    },
                    error: function (error) {
                        $('#nameError').html(error.responseJSON.errors.name);
                        $('#typeError').html(error.responseJSON.errors.type);
                        $('#addressError').html(error.responseJSON.errors.address);
                    }
                });
            });

// Function to fetch and prepend newly created clinic to the table
            function fetchNewlyCreatedClinic(newClinic) {
                if ($('#clinics-table tbody tr').length < {{ $clinics->perPage() }}) {
                    var newRow = '<tr>' +
                        '<td>' + newClinic.id + '</td>' +
                        '<td>' + newClinic.name + '</td>' +
                        '<td>' + newClinic.type + '</td>' +
                        '<td>' + newClinic.address + '</td>' +
                        '<td>' +
                        '<a href="#" class="btn btn-success btn-show" data-id="' + newClinic.id + '">Show</a>' +
                        '<a href="#" class="btn btn-info btn-edit" data-id="' + newClinic.id + '">Edit</a>' +
                        '<a href="#" class="btn btn-danger btn-delete" data-id="' + newClinic.id + '">Delete</a>' +
                        '</td>' +
                        '</tr>';
                    $('#clinics-table tbody').prepend(newRow);
                } else {
                    fetchClinicsData();
                }
            }






        });
    </script>





    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection
