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
                    <a data-toggle="modal" onclick="deleteData({{$company->id}}, '{{$company->name}}')" 
                        data-target="#DeleteModal" class="btn btn-danger" title="Delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="inline-space">
    <div>{{ $companies->links() }}</div>
    <div>
        <a href="{{ route('com.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add company
        </a>
    </div>
</div>
@include('modal')
@push('scripts')
<script>
function deleteData(id, name) {
    var url = '{{ route("com.destroy", ":id") }}'
    url = url.replace(':id', id)
    document.getElementById("deleteInfo").innerText = 'Deleting company - ' + name
    $("#deleteForm").attr('action', url)
}

function formSubmit() {
    $("#deleteForm").submit();
}
</script>
@endpush
@endsection