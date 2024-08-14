@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Pet Details</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Owner ID</th>
                <th>Color</th>
                <th>Gender</th>
                <th>Neutered</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $pet->name }}</td>
                <td>{{ $pet->owner_id }}</td>
                <td>{{ $pet->color }}</td>
                <td>{{ $pet->gender }}</td>
                <td>{{ $pet->neutered ? 'Yes' : 'No' }}</td>
                <td>{{ $pet->created_at->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}</td>
            </tr>
            </tbody>
        </table>

        <h2>Visits and Diagnoses</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Vet ID</th>
                <th>Arrived At</th>
                <th>Total Amount</th>
                <th>Diagnose</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pet->visits as $visit)
                <tr>
                    <td>{{ $visit->vet_id }}</td>
                    <td>{{ $visit->arrived_at }}</td>
                    <td>{{ $visit->total_amount }}</td>
                    <td>{{ $visit->diagnose }}</td>
                    <td>{{ $visit->created_at->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
