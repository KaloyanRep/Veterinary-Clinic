@extends('layouts.master')
@section('content')
    <div class ="container">
        <table class="table">
            <thead>
            <tr>
                <th>Vet_id</th>
                <th>Pet_id</th>
                <th>Arrived_at</th>
                <th>Total_amount</th>
                <th>Diagnose</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$visit->vet_id}}
                <td>{{$visit->pet_id}}
                <td>{{$visit->arrived_at}}
                <td>{{$visit->total_amount}}
                <td>{{$visit->diagnose}}
                <td>{{ $visit->created_at->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}</td>
            </tr>

            </tbody>
        </table>
    </div>

@endsection('content')

