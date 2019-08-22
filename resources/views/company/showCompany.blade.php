@extends('layout.app')
@section('title', 'Company')
@section('header', 'Company review')
@section('content')
<div class="review">
    <div class="row border">
        <div class="col">
            <h1>{{ $company->name }}</h1>
        </div>
    </div>
    <div class="row border">
        <div class="col border-right">
            Country - ISO
        </div>
        <div class="col">
            {{ $company->country->name }} - {{ $company->country->ISO }} 
        </div>
    </div>
    <div class="row border">
        <div class="col">
            <h4>Airports we are working with:</h4>
        </div>
    </div>
    @if ($company->airports->count() == 0)
    <div class="row border">
        <div class="col">
            Currently none
        </div>
    </div>
    @else
    @foreach ($company->airports as $airport)
    <div class="row border">
        <div class="col">
            <a href="/airports/{{$airport->id}}">{{$airport->name}}</a>
        </div>
    </div>
    @endforeach
    @endif
@endsection