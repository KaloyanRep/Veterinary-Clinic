@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Edit Clinic</h1>
        <form action="{{ route('clinics.update', $clinic->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $clinic->name }}">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" id="type" name="type">
                    <option disabled>Choose Option</option>
                    <option value="orthopedics" {{ $clinic->type == 'orthopedics' ? 'selected' : '' }}>Orthopedics</option>
                    <option value="pediatrics" {{ $clinic->type == 'pediatrics' ? 'selected' : '' }}>Pediatrics</option>
                    <option value="dermatology" {{ $clinic->type == 'dermatology' ? 'selected' : '' }}>Dermatology</option>
                    <option value="cardiology" {{ $clinic->type == 'cardiology' ? 'selected' : '' }}>Cardiology</option>
                    <option value="neurology" {{ $clinic->type == 'neurology' ? 'selected' : '' }}>Neurology</option>
                    <option value="gynecology" {{ $clinic->type == 'gynecology' ? 'selected' : '' }}>Gynecology</option>
                </select> <!-- Add the closing </select> tag here -->
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $clinic->address }}">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
