@extends('layout.app')
@section('title', 'Companies')
@section('header', 'Airlines companies')
@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Country - ISO</th>
            <th class="align-middle" style="width: 15%">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
        <tr>
            <td class="align-middle">{{$company->name}}</td>
            <td class="align-middle">{{$company->country->name}} - {{$company->country->ISO}}</td>
            <td align="center">
                <div class="actions">
                    <a href="{{route('com.edit', $company->id)}}" class="btn btn-warning">Edit</a>
                    <form class="form" action="{{ route('com.destroy', $company->id) }}" method="POST">
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
<div class="inline-space">
    <a href="{{ route('com.create') }}" class="btn btn-primary">Add company</a>
</div>
{{ $companies->links() }}
@endsection