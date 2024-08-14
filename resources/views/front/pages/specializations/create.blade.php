{{-- File: resources/views/pets/create.blade.php --}}
@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h2>Add New Specialization</h2>
        <form action="{{ route('specializations.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="vet_id" class="form-label">Vet_id:</label>
                <input type="text" class="form-control" id="vet_id" name="vet_id" required>
            </div>
            <div class="mb-3">
                <label for="specie_id" class="form-label">Specie_id:</label>
                <input type="text" class="form-control" id="specie_id" name="specie_id" required>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
