@extends('layouts.master')
@section('content')
    <div class ="container">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>City</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$vet->name}}
                <td>{{$vet->position_id}}
                <td>{{$vet->email}}
                <td>{{$vet->address}}
                <td>{{$vet->phone}}
                <td>{{$vet->city}}
                <td>{{ $vet->created_at->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}</td>
            </tr>

            </tbody>
        </table>
    </div>

@endsection('content')

