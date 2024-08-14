<div class="mb-3">
    <form method="GET" action="{{ route('vets') }}">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ request('name') }}">
            </div>
            <div class="col-md-3">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ request('email') }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="city" class="form-control" placeholder="City" value="{{ request('city') }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="arrived_at" class="form-control" placeholder="Arrived At" value="{{ request('arrived_at') }}">
            </div>
            <div class="col-md-12 mt-2">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('vets') }}" class="btn btn-secondary">Clear</a>
            </div>
        </div>
    </form>
</div>

<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone</th>
        <th>City</th>
        <th>Arrived At</th> <!-- Displaying only the Arrived At column -->
        <th>Modify</th>
    </tr>
    </thead>
    <tbody>
    @foreach($vets as $vet)
        <tr>
            <td>{{ $loop->iteration + ($vets->currentPage() - 1) * $vets->perPage() }}</td>
            <td>{{ $vet->name }}</td>
            <td>{{ $vet->email }}</td>
            <td>{{ $vet->address }}</td>
            <td>{{ $vet->phone }}</td>
            <td>{{ $vet->city }}</td>
            <td>
                @if($vet->arrived_at)
                    <div>
                        {{ \Carbon\Carbon::parse($vet->arrived_at)->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}
                    </div>
                @else
                    No visits
                @endif
            </td>
            <td>
                <a href="{{ route('vets.show', $vet->id) }}" class="btn btn-success">Show Vet</a>
                <a href="{{ route('vets.edit', $vet->id) }}" class="btn btn-info">Edit</a>
                <form action="{{ route('vets.delete', $vet->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $vets->links() }}
