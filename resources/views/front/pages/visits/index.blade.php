@extends('layouts.master')

@section('content')

    {{-- Display success messages --}}
    @if (session('success'))
        <div class="alert alert-success" id="successAlert">
            {{ session('success') }}
        </div>
    @endif


    <a href ="{{route('visits.create')}}" class="nav-link">New Visit</a>

    <div class ="container">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Vet_id</th>
                <th>Pet_id</th>
                <th>Arrived_at</th>
                <th>Total_amount</th>
                <th>Diagnose</th>
                <th>Modify</th>
            </tr>
            </thead>

            <tbody>

            @foreach($visits as $visit)
                <tr>
                    <td>{{ $loop->iteration + ($visits->currentPage() - 1) * $visits->perPage() }}</td>
                    <td>{{$visit->vet_id}}
                    <td>{{$visit->pet_id}}
                    <td>{{$visit->arrived_at}}
                    <td>{{$visit->total_amount}}
                    <td>{{$visit->diagnose}}


                    <td>
                        <a href ="{{route('visits.show',$visit->id)}}" class="btn btn-success">Show Visit</a>
                        <a href ="{{route('visits.edit',$visit->id)}}" class="btn btn-info">Edit</a>

                        <form action="{{ route('visits.delete', $visit->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            {{ $visits->links() }}

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

