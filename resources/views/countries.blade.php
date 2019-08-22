@extends('layout.app')
@section('title', 'Countries')
@section('header', 'Countries')
@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>ISO</th>
        </tr>
    </thead>
    <tbody>
        @foreach($countries as $country)
        <tr>
            <td>{{$country->name}}</td>
            <td>{{$country->ISO}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $countries->links() }}
@endsection