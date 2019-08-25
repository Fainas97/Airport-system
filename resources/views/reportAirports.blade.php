@extends('layout.app')
@section('title', 'Country airports')
@section('header', $title)
@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Country</th>
            <th>Company</th>
        </tr>
    </thead>
    <tbody>
        @foreach($airports as $airport)
        <tr>
            <td>{{$airport->airportName}}</td>
            <td>{{$countryName}}</td>
            <td>{{$airport->companyName}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $airports->links() }}
@endsection