@extends('layouts.master')

@section('content')

    {{-- Display success messages --}}
    @if (session('success'))
        <div class="alert alert-success" id="successAlert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('worktime.create') }}" class="nav-link">New Worktime</a>

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Day of Week</th>
                <th>Time From</th>
                <th>Time To</th>
                <th>Date</th>
                <th>Modify</th>
            </tr>
            </thead>
            <tbody>

            @foreach($worktimes as $worktime)
                <tr>
                    <td>{{ $loop->iteration + ($worktimes->currentPage() - 1) * $worktimes->perPage() }}</td>
                    <td>{{ $worktime->day_of_week }}</td>
                    <td>{{ $worktime->timeFrom }}</td>
                    <td>{{ $worktime->timeTo }}</td>
                    <td>{{ $worktime->created_at->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}</td>
                    <td>
                        <a href="{{ route('worktime.show', $worktime->id) }}" class="btn btn-success">Show Worktime</a>
                        <a href="{{ route('worktime.edit', $worktime->id) }}" class="btn btn-info">Edit</a>

                        <form action="{{ route('worktime.delete', $worktime->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $worktimes->links() }} <!-- Pagination links -->
    </div>
@endsection
    @section('javascripts')
        @parent

        <script>
            $(document).ready(function() {
                // Hide the success message after 5 seconds (5000 milliseconds)
                $("#successAlert").fadeTo(5000, 500).slideUp(500, function() {
                    $("#successAlert").slideUp(500);
                });
            });
        </script>
    @endsection

