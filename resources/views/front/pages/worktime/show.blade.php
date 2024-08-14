@extends('layouts.master')
@section('content')
    <div class ="container">
        <table class="table">
            <thead>
            <tr>
                <th>Day of week</th>
                <th>TimeFrom</th>
                <th>TimeTo</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$worktime->day_of_week}}
                <td>{{$worktime->timeFrom}}
                <td>{{$worktime->timeTo}}
                <td>{{ $worktime->created_at->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}</td>
            </tr>

            </tbody>
        </table>
    </div>

@endsection('content')

