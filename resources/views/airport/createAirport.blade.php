@extends('layout.app')
@section('title', 'Add airport')
@section('header', 'Create new airport')
@section('content')
<div class="data-form">
    <form class="form" action="{{ route('air.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Airport name</label>
                <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Airport name">
            </div>
            <div class="form-group col-md-6">
                <label for="country_id">Companies</label>
                <select name="companies[]" multiple class="form-control">
                    @foreach($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection