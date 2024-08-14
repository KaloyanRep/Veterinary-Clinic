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

        <h2>Edit Specialization Info</h2>
        <form action="{{ route('specializations.update', $specialization->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="vet_id" class="form-label">Vet_id:</label>
                <input type="text" class="form-control" id="vet_id" name="vet_id" value="{{ old('vet', $specialization->vet_id) }}" required>
            </div>
            <div class="mb-3">
                <label for="specie_id" class="form-label">Specie_id:</label>
                <input type="text" class="form-control" id="specie_id" name="specie_id" value="{{ old('specie', $specialization->specie_id) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Visit</button>
        </form>

    </div>
@endsection

