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

        <h2>Edit Visit Info</h2>
        <form action="{{ route('visits.update', $visit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="vet_id" class="form-label">Vet_id:</label>
                <input type="text" class="form-control" id="vet_id" name="vet_id" value="{{ old('vet', $visit->vet_id) }}" required>
            </div>
            <div class="mb-3">
                <label for="pet_id" class="form-label">Pet_id:</label>
                <input type="number" class="form-control" id="pet_id" name="pet_id" value="{{ old('pet', $visit->pet_id) }}" required>
            </div>
            <div class="mb-3">
                <label for="arrived_at" class="form-label">Arrived_at:</label>
                <input type="datetime-local" class="form-control" id="arrived_at" name="arrived_at" value="{{ old('arrived_at', $visit->arrived_at) }}" required>
            </div>
            <div class="mb-3">
                <label for="total_amount" class="form-label">Total_amount:</label>
                <input type="text" class="form-control" id="total_amount" name="total_amount" value="{{ old('total_amount', $visit->total_amount) }}" required>
            </div>
            <div class="mb-3">
                <label for="diagnose" class="form-label">Diagnose:</label>
                <input type="text" class="form-control" id="diagnose" name="diagnose" value="{{ old('diagnose', $visit->diagnose) }}" required>
            </div>


            <button type="submit" class="btn btn-primary">Update Visit</button>
        </form>

    </div>
@endsection

