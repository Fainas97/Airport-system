@extends('layout.app')
@section('title', 'Airports')
@section('header', 'Airport System')
@section('content')
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th style="width: 20%">Name</th>
      <th style="width: 20%">Country</th>
      <th style="width: 25%">Coordinates</th>
      <th style="width: 20%">Company</th>
      <th class="align-middle" style="width: 15%">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($airports as $airport)
    <tr>
      <td class="align-middle">{{$airport->name}}</td>
      <td class="align-middle">{{$airport->country}}</td>
      <td class="align-middle">{{$airport->lng}} {{$airport->lat}}</td>
      <td class="align-middle">{{$airport->company_id}}</td>
      <td align="center">
        <div class="actions">
          <a href="{{route('air.edit', $airport->id)}}" class="btn btn-warning">Edit</a>
          <form class="form" action="{{ route('air.destroy', $airport->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection