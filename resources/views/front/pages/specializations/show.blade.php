@extends('layouts.master')
@section('content')
    <div class ="container">
        <table class="table">
            <thead>
            <tr>
                <th>Vet_id</th>
                <th>Specie_id</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$specialization->vet_id}}
                <td>{{$specialization->specie_id}}
                <td>{{ $specialization->created_at->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}</td>
            </tr>

            </tbody>
        </table>
    </div>

@endsection('content')

