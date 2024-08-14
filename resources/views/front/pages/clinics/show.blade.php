@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Clinic Details</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Name:</strong> {{ $clinic->name }}</li>
                            <li class="list-group-item"><strong>Type:</strong> {{ $clinic->type }}</li>
                            <li class="list-group-item"><strong>Address:</strong> {{ $clinic->address }}</li>
                            <!-- Add more details as needed -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
