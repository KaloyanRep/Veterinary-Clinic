{{-- File: resources/views/pets/create.blade.php --}}
@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h2>Add New Prescription</h2>
        <form action="{{ route('prescriptions.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="vet_id" class="form-label">Vet_id:</label>
                <input type="text" class="form-control" id="vet_id" name="vet_id" required>
            </div>
            <div class="mb-3">
                <label for="owner_id" class="form-label">Owner_id:</label>
                <input type="text" class="form-control" id="owner_id" name="owner_id" required>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
