@extends('layout.app')
@section('title', 'Edit company')
@section('header', 'Edit company')
@section('content')
<div class="data-form">
    <form class="form" action="{{ route('com.update', $company->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Company name</label>
                <input type="text" class="form-control" value="{{$company->name}}" name="name"
                    placeholder="Company name">
            </div>
            <div class="form-group col-md-6">
                <label for="country_id">Country</label>
                <select name="country_id" class="form-control">
                    @foreach($countries as $country)
                    @if ($company->country_id == $country->id)
                    <option value="{{$country->id}}" selected>{{$country->name}}</option>
                    @else
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection