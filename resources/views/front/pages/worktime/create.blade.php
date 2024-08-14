{{-- File: resources/views/worktimes/create.blade.php --}}
@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h2>Add New Worktime</h2>
        <form action="{{ route('worktime.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="dayOfWeek" class="form-label">Day of the Week:</label>
                <select class="form-control" id="dayOfWeek" name="day_of_week" required>
                    <option value="">Select a Day</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="timeFrom" class="form-label">Time From:</label>
                <input type="time" class="form-control" id="timeFrom" name="timeFrom" required>
            </div>
            <div class="mb-3">
                <label for="timeTo" class="form-label">Time To:</label>
                <input type="time" class="form-control" id="timeTo" name="timeTo" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
