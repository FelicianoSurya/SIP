@extends('layouts.app')

@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="d-flex flex-column w-100 justify-content-center align-items-center">    
    <h1 class="mb-5">Add Place</h1>
        <form method="POST" action="{{ route('postPlace') }}" class="w-50">
            @csrf
            <input type="hidden" name="userId" value="{{ Auth()->user()->id }}" name="userId">
            <div class="form-group d-flex flex-column">
                <label for="placeName">{{ __('Place Name') }}</label>
                <input type="text" class="form-control mb-3" name="name">
            </div>
            <div class="form-group d-flex flex-column">
                <label for="phoneNumber">{{ __('Place PIC Phone Number') }}</label>
                <input type="text" class="form-control  mb-3" name="phoneNumber">
            </div>
            <div class="form-group d-flex flex-column">
                <label for="typePlace">{{ __('Place Type') }}</label>
                <select name="typeId" class="form-control mb-3" id="typeId" name="typeId">
                    <option value=""></option>
                    @foreach($dataType as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group d-flex flex-column">
                <label for="address">{{ __('Place Address') }}</label>
                <input type="text" class="form-control  mb-3" name="address">
            </div>
            <div class="form-group d-flex flex-column">
                <label for="addressBox">{{ __('Place SearchBox') }}</label>            
                <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Enter Location">
            </div>  
            <div class="form-group d-flex flex-column" id="latitudeArea">
                <input type="hidden" id="latitude" name="latitude" class="form-control">
            </div>  
            <div class="form-group d-flex flex-column" id="longtitudeArea">
                <input type="hidden" name="longitude" id="longitude" class="form-control">
            </div>
            <div id="map" style="width:100%;height: 400px"></div>
            <div class="flex    ">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger">Back</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('custom-js')
@parent
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
    <script type="text/javascript">
        let map, activeInfoWindow, markers, searchBox = [];
        /* ----------------------------- Initialize Map ----------------------------- */
        function initialize() {
            alert("test")
            navigator.geolocation.getCurrentPosition(clientPosition);
            function clientPosition(position){
                var latitude,longitude;
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    },
                    zoom: 15,
                });
                const currentLocation = {
                    lat : position.coords.latitude,
                    lng : position.coords.longitude
                }
                markers = new google.maps.Marker({
                    position: {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    },
                    map: map,
                    draggable: true,
                })
            }
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.SearchBox(input);

            google.maps.event.addListener(autocomplete, 'places_changed', function(){
                var places = autocomplete.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for(i = 0 ; place=places[i]; i++){
                    bounds.extend(place.geometry.location);
                    markers.setPosition(place.geometry.location);
                }

                var lat = markers.getPosition().lat();
                var lng = markers.getPosition().lng();
                
                $('#latitude').val(lat);
                $('#longitude').val(lng);

                map.fitBounds(bounds);
                map.setZoom(15);
                
                google.maps.event.addListener(markers, 'position_changed', function(){
                    var lat = markers.getPosition().lat();
                    var lng = markers.getPosition().lng();

                    $('#latitude').val(lat);
                    $('#longitude').val(lng);
            })
        });            
        }
    </script>
@endsection