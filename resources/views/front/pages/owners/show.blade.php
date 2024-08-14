@extends('layouts.master')
@section('content')
       <div class ="container">
               <table class="table">
                   <thead>
                   <tr>
                       <th>Name</th>
                       <th>Address</th>
                       <th>Email</th>
                       <th>Phone</th>
                       <th>Date</th>

                   </tr>
                   </thead>
                   <tbody>
                   <tr>
                       <td>{{$owner->name}}
                       <td>{{$owner->address}}
                       <td>{{$owner->email}}
                       <td>{{$owner->phone}}
                       <td>{{ $owner->created_at->timezone('Europe/Sofia')->format('F j, Y, g:i A') }}</td>
                   </tr>

                   </tbody>
               </table>
           </div>

@endsection('content')
