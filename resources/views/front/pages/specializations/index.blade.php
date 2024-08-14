@extends('layouts.master')

@section('content')

    {{-- Display success messages --}}
    @if (session('success'))
        <div class="alert alert-success" id="successAlert">
            {{ session('success') }}
        </div>
    @endif


    <a href ="{{route('specializations.create')}}" class="nav-link">New Specialization</a>

    <div class ="container">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Vet_id</th>
                <th>Specie_id</th>
                <th>Date</th>
                <th>Modify</th>
            </tr>
            </thead>

            <tbody>

            @foreach($specializations as $specialization)
                <tr>
                    <td>{{ $loop->iteration + ($specializations->currentPage() - 1) * $specializations->perPage() }}</td>
                    <td>{{$specialization->vet_id}}
                    <td>{{$specialization->specie_id}}
                    <td>{{ $specialization->created_at->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}</td>

                    <td>
                        <a href ="{{route('specializations.show',$specialization->id)}}" class="btn btn-success">Show Specialization</a>
                        <a href ="{{route('specializations.edit',$specialization->id)}}" class="btn btn-info">Edit</a>

                        <form action="{{ route('specializations.delete', $specialization->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            {{$specializations->links()}}

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Hide the success message after 5 seconds (5000 milliseconds)
                    $("#successAlert").fadeTo(5000, 500).slideUp(500, function() {
                        $("#successAlert").slideUp(500);
                    });
                });
            </script>

            </tbody>
        </table>
    </div>

@endsection


