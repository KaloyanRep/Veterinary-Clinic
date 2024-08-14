@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800">Clients</h1>
        <p class="mt-4 text-gray-600">Here are a list of your clients:</p>
        @foreach($clients as $client)
            <div class="py-3 text-gray-900">
                <h3 class="text-lg text-gray-500">{{$client->name}}</h3>
                <p>{{$client->redirect}}</p>
            </div>
        @endforeach

        <div class="mt-8">
            <form action="" method="POST">
                @csrf
                <div>
                    <label for="name" class="block font-medium text-gray-700">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Client name" class="form-input mt-1 block w-full" required autofocus />
                </div>

                <div class="mt-4">
                    <label for="redirect" class="block font-medium text-gray-700">Redirect URL:</label>
                    <input type="url" name="redirect" id="redirect" placeholder="https://my-url.com/callback" class="form-input mt-1 block w-full" required />
                    <p class="mt-2 text-sm text-gray-500">The URL to redirect after authorization.</p>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 text-black py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Create Client</button>
                </div>
            </form>
        </div>
    </div>
@endsection
