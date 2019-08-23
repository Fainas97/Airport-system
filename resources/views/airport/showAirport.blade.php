@extends('layout.app')
@section('title', 'Airport')
@section('header', 'Airport review')
@section('content')
<div class="review">
    <div class="row border">
        <div class="col align-text">
            <h1>{{ $airport->name }}</h1>
        </div>
    </div>
    <div class="row border">
        <div class="col align-text">
            <h5>Coordinates and country</h5>
        </div>
    </div>
    <div class="row border">
        <div class="col border-right align-text">
            Latitude
        </div>
        <div class="col align-text">
            {{ $airport->lat }}
        </div>
    </div>
    <div class="row border">
        <div class="col border-right align-text">
            Longitude
        </div>
        <div class="col align-text">
            {{ $airport->lng }}
        </div>
    </div>
    <div class="row border">
        <div class="col border-right align-text">
            Country
        </div>
        <div class="col align-text">
            {{ $airport->country }}
        </div>
    </div>
    <div class="row border">
        <div class="col align-text">
            <h4>Companies</h4>
        </div>
    </div>
    @if ($airport->companies->count() == 0)
    <div class="row border">
        <div class="col align-text">
            Has zero companies flying
        </div>
    </div>
    @else
    @foreach($airport->companies as $company)
    <div class="row border">
        <div class="col align-text">
            <a href="/companies/{{$company->id}}">{{ $company->name }}</a>
        </div>
    </div>
    @endforeach
    @endif
</div>
@endsection