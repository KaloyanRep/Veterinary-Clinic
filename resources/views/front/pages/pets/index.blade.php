@extends('layouts.master')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    {{-- Display success messages --}}
    @if (session('success'))
        <div class="alert alert-success" id="successAlert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pets.create') }}" class="nav-link">New Pet</a>

    <div class="container">

        <h2>Total Pets ({{$pets->total()}})</h2>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('pets') }}" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Filter by name" value="{{ request('name') }}">
                </div>
                <div class="col-md-2">
                    <select name="gender" class="form-control">
                        <option value="">Filter by gender</option>
                        <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="date" name="created_from" class="form-control" placeholder="Created from" value="{{ request('created_from') }}">
                </div>
                <div class="col-md-2">
                    <input type="date" name="created_to" class="form-control" placeholder="Created to" value="{{ request('created_to') }}">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                    <a href="{{ route('pets') }}" class="btn btn-secondary">Reset Filters</a>
                </div>
            </div>
        </form>

        <h2>All Pets</h2>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Owner ID</th>
                <th>Color</th>
                <th>Gender</th>
                <th>Neutered</th>
                <th>Date</th>
                <th>Modify</th>
            </tr>
            </thead>
            <tbody>
            @if ($pets->count() > 0)
                @foreach($pets as $index => $pet)
                    <tr>
                        <td>{{ ($pets->currentPage() - 1) * $pets->perPage() + $index + 1 }}</td>
                        <td>{{ $pet->name }}</td>
                        <td>{{ $pet->owner_id }}</td>
                        <td>{{ $pet->color }}</td>
                        <td>{{ $pet->gender }}</td>
                        <td>{{ $pet->neutered ? 'Yes' : 'No' }}</td>
                        <td>{{ \Carbon\Carbon::parse($pet->created_at)->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}</td>
                        <td>
                            <a href="{{ route('pets.show', $pet->id) }}" class="btn btn-success">Show Pet</a>
                            <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-info">Edit</a>
                            <button class="btn btn-primary fetch-pet-info" data-pet-id="{{ $pet->id }}">Fetch Info</button>
                            <form action="{{ route('pets.delete', $pet->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">No query results found</td>
                </tr>
            @endif
            </tbody>
        </table>

        {{ $pets->appends(request()->input())->links() }}

    </div>

    <!-- Modal -->
    <div class="modal" id="petInfoModal">
        <div class="modal-content" id="modalContent">
            <!-- Content will be dynamically added here -->
        </div>
    </div>

@endsection

@section('javascripts')
    @parent
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Hide success message after 5 seconds
            $("#successAlert").fadeTo(5000, 500).slideUp(500, function() {
                $("#successAlert").slideUp(500);
            });

            // Event listener for fetching pet info and opening modal
            $(".fetch-pet-info").click(function() {
                var petId = $(this).data("pet-id");

                // Make AJAX request
                $.ajax({
                    url: "{{ route('pets.info', ':id') }}".replace(':id', petId),
                    type: "GET",
                    success: function(response) {
                        var modalContent = `
                            <h2>Pet Information</h2>
                            <p><strong>Pet ID:</strong> ${response.id}</p>
                            <p><strong>Name:</strong> ${response.name}</p>
                            <p><strong>Color:</strong> ${response.color}</p>
                            <p><strong>Gender:</strong> ${response.gender}</p>
                        `;
                        $('#modalContent').html(modalContent);
                        $('#petInfoModal').show();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
