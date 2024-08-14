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

        <h2>Edit Vet Info</h2>
        <form action="{{ route('vets.update', $vet->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $vet->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="position_id" class="form-label">Position:</label>
                <input type="number" class="form-control" id="position_id" name="position_id" value="{{ old('position', $vet->position_id) }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $vet->email) }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $vet->address) }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $vet->phone) }}" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City:</label>
                <input type="city" class="form-control" id="city" name="city" value="{{ old('city', $vet->city) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Vet</button>
        </form>

    </div>
@endsection

