@extends('layout.app')
@section('title', $title)
@section('header', $title)
@section('content')
<div class="data-form">
    <form class="form" action="{{ route('rep.filter') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="country_id">Countries</label>
                <select name="country_id" class="form-control">
                    @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" style="max-height: 37px">Filter</button>
    </form>
</div>
@endsection