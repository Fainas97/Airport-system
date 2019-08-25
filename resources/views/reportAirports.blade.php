@extends('layout.app')
@section('title', 'Country airports')
@section('header', $title)
@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Country</th>
        </tr>
    </thead>
    <tbody>
        @if ($airports->count() > 0)
        @foreach($airports as $airport)
        <tr>
            <td>{{$airport->name}}</td>
            <td>{{$airport->country}}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="2">Companies in this country do not exist or work with zero airports</td>
        </tr>
        @endif
    </tbody>
</table>
{{ $airports->links() }}
@endsection