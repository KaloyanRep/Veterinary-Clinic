@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>Edit Pet Info</h2>
            <form action="{{ route('pets.update', $pet->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pet->name) }}" required>
                </div>
                <div class="mb-3">
                    <label for="owner_id" class="form-label">Owner_id:</label>
                    <input type="number" class="form-control" id="owner_id" name="owner_id" value="{{ old('owner', $pet->owner_id) }}" required>
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Color:</label>
                    <input type="text" class="form-control" id="color" name="color" value="{{ old('color', $pet->color) }}" required>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender:</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="Male" {{ $pet->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $pet->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="neutered" name="neutered" value="1" {{ $pet->neutered ? 'checked' : '' }}>
                    <label class="form-check-label" for="neutered">Neutered</label>
                </div>
                <button type="submit" class="btn btn-primary">Update Pet</button>
            </form>

    </div>
@endsection
