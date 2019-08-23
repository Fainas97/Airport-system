@extends('layout.app')
@section('title', 'Add airport')
@section('header', 'Create new airport')
@section('content')
<div class="data-form">
    <form class="form" action="{{ route('air.store') }}" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="lat" id="lat" value="{{old('lat')}}">
        <input type="hidden" class="form-control" name="lng" id="lng" value="{{old('lng')}}">
        <input type="hidden" class="form-control" name="country" id="country" value="{{old('country')}}">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Airport name</label>
                <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Airport name">
            </div>
            <div class="form-group col-md-6">
                <label for="country_id">Companies</label>
                <select name="companies[]" multiple class="form-control">
                    @foreach($companies as $company)
                    @if (old('companies') && in_array($company->id, old('companies')))
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
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@push('scripts')
<script>
var lat
var lng
var map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: {
        lat: {!! old('lat', 50) !!},
        lng: {!! old('lng', 10) !!}
    },
    zoom: 3
})

var marker = new google.maps.Marker({
    position: {
        lat: {!! old('lat', 50) !!},
        lng: {!! old('lng', 10) !!}
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