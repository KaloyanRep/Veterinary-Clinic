@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Delete Clinic</div>
                    <div class="card-body">
                        <p>Are you sure you want to delete this clinic?</p>
                        <!-- Pass clinic ID to JavaScript -->
                        <button type="button" class="btn btn-danger" id="deleteClinicBtn" data-clinic-id="{{ $clinic->id }}">Delete Clinic</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // AJAX request to delete clinic
        $(document).ready(function () {
            $('#deleteClinicBtn').click(function () {
                var clinicId = $(this).data('clinic-id'); // Retrieve clinic ID from button
                $.ajax({
                    url: "{{ route('clinics.delete', ['id' => $clinic->id]) }}", // Use route helper to generate URL
                    type: 'DELETE',
                    success: function (response) {
                        // Handle success response
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
