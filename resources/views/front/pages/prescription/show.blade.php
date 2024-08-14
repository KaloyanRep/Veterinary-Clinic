@extends('layouts.master')
@section('content')
    <div class ="container">
        <table class="table">
            <thead>
            <tr>
                <th>Vet_id</th>
                <th>Owner_id</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$prescription->vet_id}}
                <td>{{$prescription->owner_id}}
                <td>{{ $prescription->created_at->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}</td>
            </tr>

            </tbody>
        </table>
    </div>

@endsection('content')

