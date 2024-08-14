<table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Date</th>
            <th>Modify</th>
        </tr>
        </thead>

        <tbody>

        @foreach($species as $specie)
            <tr>
                <td>{{ $loop->iteration + ($species->currentPage() - 1) * $species->perPage() }}</td>
                <td>{{$specie->name}}
                <td>{{ $specie->created_at->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}</td>

                <td>
                    <a href ="{{route('species.show',$specie->id)}}" class="btn btn-success">Show Specie</a>
                    <a href ="{{route('species.edit',$specie->id)}}" class="btn btn-info">Edit</a>

                    <form action="{{ route('species.delete', $specie->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
</table>
{{$species->links()}}

