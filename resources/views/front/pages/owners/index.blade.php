@extends('layouts.master')

@section('content')

    @if (session('success'))
        <div class="alert alert-success" id="successAlert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('owners.create') }}" class="nav-link">New Owner</a>

    <div class="container">
        <h2>Total Owners ({{ $owners->total() }})</h2>

        <form method="GET" action="{{ route('owners') }}" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Filter by name" value="{{ request('name') }}">
                </div>
                <div class="col-md-3">
                    <input type="text" name="address" class="form-control" placeholder="Filter by address" value="{{ request('address') }}">
                </div>
                <div class="col-md-3">
                    <input type="text" name="email" class="form-control" placeholder="Filter by email" value="{{ request('email') }}">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                    <a href="{{ route('owners') }}" class="btn btn-secondary">Reset Filters</a>
                </div>
            </div>
        </form>

        <h2>All Owners</h2>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Modify</th>
            </tr>
            </thead>
            <tbody>
            @foreach($owners as $owner)
                <tr>
                    <td>{{ $loop->iteration + ($owners->currentPage() - 1) * $owners->perPage() }}</td>
                    <td>{{ $owner->name }}</td>
                    <td>{{ $owner->address }}</td>
                    <td>{{ $owner->email }}</td>
                    <td>{{ $owner->phone }}</td>
                    <td>{{ $owner->created_at->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}</td>
                    <td>
                        <a href="{{ route('owners.show', $owner->id) }}" class="btn btn-success">Show Owner</a>
                        <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('owners.delete', $owner->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $owners->links() }}

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#successAlert").fadeTo(5000, 500).slideUp(500, function() {
                    $("#successAlert").slideUp(500);
                });
            });
        </script>
    </div>

@endsection
