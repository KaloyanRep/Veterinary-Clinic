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

        <h2>Edit Worktime Info</h2>
        <form action="{{ route('worktime.update', $worktime->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="dayOfWeek" class="form-label">Day of the Week:</label>
                <select class="form-control" id="dayOfWeek" name="day_of_week" required>
                    <option value="">Select a Day</option>
                    <option value="Monday" @if($worktime->day_of_week == 'Monday') selected @endif>Monday</option>
                    <option value="Tuesday" @if($worktime->day_of_week == 'Tuesday') selected @endif>Tuesday</option>
                    <option value="Wednesday" @if($worktime->day_of_week == 'Wednesday') selected @endif>Wednesday</option>
                    <option value="Thursday" @if($worktime->day_of_week == 'Thursday') selected @endif>Thursday</option>
                    <option value="Friday" @if($worktime->day_of_week == 'Friday') selected @endif>Friday</option>
                    <option value="Saturday" @if($worktime->day_of_week == 'Saturday') selected @endif>Saturday</option>
                    <option value="Sunday" @if($worktime->day_of_week == 'Sunday') selected @endif>Sunday</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="timeFrom" class="form-label">Time From:</label>
                <input type="time" class="form-control" id="timeFrom" name="timeFrom" value="{{ old('timeFrom', $worktime->timeFrom) }}" required>
            </div>
            <div class="mb-3">
                <label for="timeTo" class="form-label">Time To:</label>
                <input type="time" class="form-control" id="timeTo" name="timeTo" value="{{ old('timeTo', $worktime->timeTo) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Worktime</button>
        </form>
    </div>
@endsection
