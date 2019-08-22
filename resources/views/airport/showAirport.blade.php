@extends('layout.app')
@section('title', 'Airport')
@section('header', 'Airport')
@section('content')
<div class="review">
    <div class="row border">
        <div class="col" style="text-align: center">
            <h1>{{ $airport->name }}</h1>
        </div>
    </div>
    <div class="row border">
        <div class="col border-right">
            Coordinates
        </div>
        <div class="col">
            {{ $airport->lng }} - {{ $airport->lat }}
        </div>
    </div>
    <div class="row border">
        <div class="col" style="text-align: center">
            Companies
        </div>
    </div>
    @if ($airport->companies->count() == 0)
    <div class="row border">
        <div class="col" style="text-align: center">
            Has zero companies flying
        </div>
    </div>
    @else
    @foreach($airport->companies as $company)
    <div class="row border">
        <div class="col" style="text-align: center">
            {{ $company->name }}
        </div>
    </div>
</div>
@endforeach
@endif
@endsection