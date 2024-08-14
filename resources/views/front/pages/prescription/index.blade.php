@extends('layouts.master')

@section('content')

    {{-- Display success messages --}}
    @if (session('success'))
        <div class="alert alert-success" id="successAlert">
            {{ session('success') }}
        </div>
    @endif

    <a href ="{{route('prescriptions.create')}}" class="nav-link">New Prescription</a>

    <div class ="container">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Vet_id</th>
                <th>Owner_id</th>
                <th>Date</th>
                <th>Modify</th>
            </tr>
            </thead>
            <tbody>

            @foreach($prescriptions as $prescription)
                <tr>
                    <td>{{ $loop->iteration + ($prescriptions->currentPage() - 1) * $prescriptions->perPage() }}</td>
                    <td>{{$prescription->vet_id}}
                    <td>{{$prescription->owner_id}}
                    <td>{{ $prescription->created_at->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}</td>

                    <td>
                        <a href ="{{route('prescriptions.show',$prescription->id)}}" class="btn btn-success">Show Prescription</a>
                        <a href ="{{route('prescriptions.edit',$prescription->id)}}" class="btn btn-info">Edit</a>

                        <form action="{{ route('prescriptions.delete', $prescription->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $prescriptions->links() }}
    </div>
@endsection

@section('javascripts')
    @parent

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Hide the success message after 5 seconds (5000 milliseconds)
                    $("#successAlert").fadeTo(5000, 500).slideUp(500, function() {
                        $("#successAlert").slideUp(500);
                    });
                });
            </script>
@endsection


