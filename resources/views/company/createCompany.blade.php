@extends('layout.app')
@section('title', 'Add company')
@section('header', 'Create new company')
@section('content')
<div class="data-form">
    <form class="form" action="{{ route('com.store') }}" method="POST">
    @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Company name</label>
                <input type="text" class="form-control"  value="{{old('name')}}" name="name" placeholder="Company name">
            </div>
            <div class="form-group col-md-6">
                <label for="country_id">Country</label>
                <select name="country_id" class="form-control">
                    @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection