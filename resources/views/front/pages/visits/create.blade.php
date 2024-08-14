{{-- File: resources/views/pets/create.blade.php --}}
@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h2>Add New Visit</h2>
        <form action="{{ route('visits.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="vet_id" class="form-label">Vet_id:</label>
                <input type="text" class="form-control" id="vet_id" name="vet_id" required>
            </div>
            <div class="mb-3">
                <label for="pet_id" class="form-label">Pet_id:</label>
                <input type="text" class="form-control" id="pet_id" name="pet_id" required>
            </div>
            <div class="mb-3">
                <label for="arrived_at" class="form-label">Arrived_at:</label>
                <input type="datetime-local" class="form-control" id="arrived_at" name="arrived_at" required>
            </div>
            <div class="mb-3">
                <label for="total_amount" class="form-label">Total_amount:</label>
                <input type="text" class="form-control" id="total_amount" name="total_amount" required>
            </div>
            <div class="mb-3">
                <label for="diagnose" class="form-label">Diagnose:</label>
                <input type="text" class="form-control" id="diagnose" name="diagnose" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
