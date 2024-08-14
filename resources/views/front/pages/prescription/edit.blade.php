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

        <h2>Edit Prescription Info</h2>
        <form action="{{ route('prescriptions.update', $prescription->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="vet_id" class="form-label">Vet_id:</label>
                <input type="text" class="form-control" id="vet_id" name="vet_id" value="{{ old('vet', $prescription->vet_id) }}" required>
            </div>
            <div class="mb-3">
                <label for="owner_id" class="form-label">Owner_id:</label>
                <input type="text" class="form-control" id="owner_id" name="owner_id" value="{{ old('pet', $prescription->owner_id) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Visit</button>
        </form>

    </div>
@endsection

