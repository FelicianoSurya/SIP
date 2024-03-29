@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Google Autocomplete Address In Laravel 8 - Techsolutionstuff</h2><br>  
    <div class="form-group">            
        <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Enter Location">
    </div>  
    <div class="form-group" id="latitudeArea">
        <label>Latitude</label>
        <input type="text" id="latitude" name="latitude" class="form-control">
    </div>  
    <div class="form-group" id="longtitudeArea">
        <label>Longitude</label>
        <input type="text" name="longitude" id="longitude" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>  
<h1 class="text-center">Laravel Google Maps</h1>
        <div id="map" style="width:100%;height: 400px"></div>
@endsection

@section('custom-js')
@parent
    <script>
        let map, activeInfoWindow, markers, searchBox = [];
/* ----------------------------- Initialize Map ----------------------------- */
        function initMap() {
            navigator.geolocation.getCurrentPosition(clientPosition);
            geocoder = new google.maps.Geocoder();
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
                var lat = markers.getPosition().lat();
                var lng = markers.getPosition().lng();
                $('#latitude').val(lat);
                $('#longitude').val(lng);
                $.ajax({url: "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lng + "&sensor=true&key={{ env('GOOGLE_MAPS_API_KEY') }}", success: function(data){
                        arrayList = data.results[0].address_components;
                        console.log(data.results[0].address_components)
                        for(var x = 0 ; x < arrayList.length; x++){
                            if(arrayList[x].types[0] == 'route'){
                                console.log(arrayList[x].long_name)
                            }
                        }
                    }
                })
                google.maps.event.addListener(markers, 'position_changed', function(){
                    // geocoder.geocode({
                    //     'latLng': currentLocation,
                    // }, function(result,status){
                    //     alert(result[1].formatted_address)
                    // })
                    var lat = markers.getPosition().lat();
                    var lng = markers.getPosition().lng();
                    $('#latitude').val(lat);
                    $('#longitude').val(lng);
                    $.ajax({url: "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lng + "&sensor=true&key={{ env('GOOGLE_MAPS_API_KEY') }}", success: function(data){
                        arrayList = data.results[0].address_components;
                        for(var x = 0 ; x < arrayList.length; x++){
                            if(arrayList[x].types[0] == 'route'){
                                console.log(arrayList[x].long_name)
                            }
                        }
                    }
                })
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
                    // geocoder.geocode({
                    //     'latLng': currentLocation,
                    // }, function(result,status){
                    //     alert(result[1].formatted_address)
                    // })
                    var lat = markers.getPosition().lat();
                    var lng = markers.getPosition().lng();
                    $('#latitude').val(lat);
                    $('#longitude').val(lng);
                    $.ajax({url: "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lng + "&sensor=true&key={{ env('GOOGLE_MAPS_API_KEY') }}", success: function(data){
                        arrayList = data.results[0].address_components;
                        for(var x = 0 ; x < arrayList.length; x++){
                            if(arrayList[x].types[0] == 'route'){
                                console.log(arrayList[x].long_name)
                            }
                        }
                    }
                })
                })
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap" async defer></script>
@endsection