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
            <td class="align-middle">
                <a href="/companies/{{$company->id}}">{{$company->name}}</a>
            </td>
            <td class="align-middle">{{$company->country->name}} - {{$company->country->ISO}}</td>
            <td align="center">
                <div class="actions">
                    <a href="{{route('com.edit', $company->id)}}" class="btn btn-warning" title="Edit">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <form class="form" action="{{ route('com.destroy', $company->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit" title="Delete"><i class="fa fa-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="inline-space">
    <a href="{{ route('com.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Add company
    </a>
</div>
{{ $companies->links() }}
@endsection