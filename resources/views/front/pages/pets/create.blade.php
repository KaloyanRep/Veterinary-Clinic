{{-- File: resources/views/pets/create.blade.php --}}
@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h2>Add New Pet</h2>
        <form action="{{ route('pets.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="owner_id" class="form-label">Owner ID:</label>
                <input type="number" class="form-control" id="owner_id" name="owner_id" required>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color:</label>
                <input type="text" class="form-control" id="color" name="color" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <!-- Add other genders as needed -->
                </select>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="neutered" name="neutered" value="1">
                <label class="form-check-label" for="neutered">Neutered</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
