@extends('layout.app')
@section('title', 'Edit airport')
@section('header', 'Edit airport')
@section('content')
@php 
$companiesIds = $airport->companies->pluck('id')->toArray();
@endphp
<div class="data-form">
    <form class="form" action="{{ route('air.update' , $airport->id) }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" class="form-control" name="lat" id="lat" value="{{$airport->lat}}">
        <input type="hidden" class="form-control" name="lng" id="lng" value="{{$airport->lat}}">
        <input type="hidden" class="form-control" name="country" id="country" value="{{$airport->country}}">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Airport name</label>
                <input type="text" class="form-control" value="{{$airport->name}}" name="name" placeholder="Airport name">
            </div>
            <div class="form-group col-md-6">
                <label for="country_id">Companies</label>
                <select name="companies[]" multiple class="form-control">
                    @foreach($companies as $company)
                    @if (in_array($company->id, $companiesIds))
                    <option selected value="{{$company->id}}">{{$company->name}}</option>
                    @else
                    <option value="{{$company->id}}">{{$company->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col">
                <label for="airport-place">Select country and coordinates for the airport</label>
                <div class="col" id="map-canvas" style="height: 400px"></div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@push('scripts')
<script>
var lat
var lng
var map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: {
        lat: {!! $airport->lat !!},
        lng: {!! $airport->lng  !!}
    },
    zoom: 3
})

var marker = new google.maps.Marker({
    position: {
        lat: {!! $airport->lat !!},
        lng: {!! $airport->lng  !!}
    },
    map: map,
    draggable: true
})

google.maps.event.addListener(marker, 'dragend', function() {
    this.lat = marker.getPosition().lat()
    this.lng = marker.getPosition().lng()

    $('#lat').val(this.lat.toFixed(8));
    $('#lng').val(this.lng.toFixed(8));

    $.ajax({
        url: 'https://maps.googleapis.com/maps/api/geocode/json?key={{ env('API_KEY') }}&latlng=' 
            + this.lat + '%2C' + this.lng + '&result_type=country&language=en',
        dataType: 'json',
        success: function(results) {
            $("#country").val(results.results[0].formatted_address)
        }
    })
})
</script>
@endpush
@endsection