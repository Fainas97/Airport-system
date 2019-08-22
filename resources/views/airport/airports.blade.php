@extends('layout.app')
@section('title', 'Airports')
@section('header', 'Airport System')
@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width: 25%">Name</th>
            <th style="width: 25%">Country</th>
            <th style="width: 35%">Coordinates</th>
            <th class="align-middle" style="width: 15%">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($airports as $airport)
        <tr>
            <td class="align-middle">
                <a href="/airports/{{$airport->id}}">{{$airport->name}}</a>
            </td>
            <td class="align-middle">{{$airport->country}}</td>
            <td class="align-middle">{{$airport->lng}} - {{$airport->lat}}</td>
            <td align="center">
                <div class="actions">
                    <a href="{{route('air.edit', $airport->id)}}" class="btn btn-warning" title="Edit">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <form class="form" action="{{ route('air.destroy', $airport->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit" title="Delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="inline-space">
    <a href="{{ route('air.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Add airport
    </a>
</div>
{{ $airports->links() }}
@endsection