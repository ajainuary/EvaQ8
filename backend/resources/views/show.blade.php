@extends('app')
@section('title', 'Show People')
@section('content')
<br>
<h1 class="display-3" align="center">Registered People</h1>
<br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Latitude</th>
      <th scope="col">Longitude</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($people as $person)
    <tr>
      <th scope="row">{{$person->id}}</th>
      <td>{{$person->name}}</td>
      <td>{{$person->phone_number}}</td>
      <td>{{$person->latitude}}</td>
      <td>{{$person->longitude}}</td>
      <td>{{$person->status}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection