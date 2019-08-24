@extends('layout.app')
@section('title', 'Airports')
@section('header', 'Airport System')
@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width: 25%">Name</th>
            <th style="width: 25%">Country</th>
            <th style="width: 17%">Latitude</th>
            <th style="width: 17%">Longitude</th>
            <th class="align-middle" style="width: 16%">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if($airports->count() > 0)
        @foreach($airports as $airport)
        <tr>
            <td class="align-middle">
                <a href="/airports/{{$airport->id}}">{{$airport->name}}</a>
            </td>
            <td class="align-middle">{{$airport->country}}</td>
            <td class="align-middle">{{$airport->lat}}</td>
            <td class="align-middle">{{$airport->lng}}</td>
            <td align="center">
                <div class="actions">
                    <a href="{{route('air.edit', $airport->id)}}" class="btn btn-warning" title="Edit">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a data-toggle="modal" onclick="deleteData({{$airport->id}}, '{{$airport->name}}')"
                        data-target="#DeleteModal" class="btn btn-danger" title="Delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="5" align="center">Zero airports available</td>
        </tr>
        @endif
    </tbody>
</table>
<div class="inline-space">
    <div>{{ $airports->links() }}</div>
    <div>
        <a href="{{ route('air.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add airport
        </a>
    </div>
</div>
@include('modal')
@push('scripts')
<script>
function deleteData(id, name) {
    var url = '{{ route("air.destroy", ":id") }}'
    url = url.replace(':id', id)
    document.getElementById("deleteInfo").innerText = 'Deleting airport - ' + name
    $("#deleteForm").attr('action', url)
}

function formSubmit() {
    $("#deleteForm").submit();
}
</script>
@endpush
@endsection