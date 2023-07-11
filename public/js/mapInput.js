let map, activeInfoWindow, markers, searchBox = [];
let key = "AIzaSyBIxKrh1xIRVyGMc7bJe85JrSuhSDZY7yc";
/* ----------------------------- Initialize Map ----------------------------- */
window.onload = function () {
    navigator.geolocation.getCurrentPosition(clientPosition);
    geocoder = new google.maps.Geocoder();
    function clientPosition(position) {
        var latitude, longitude;
        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            },
            zoom: 15,
        });
        const currentLocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
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
        $.ajax({
            url: "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lng + "&sensor=true&key=" + key, success: function (data) {

                arrayList = data.results[0].address_components;
                console.log(data.results[0].address_components)
                for (var x = 0; x < arrayList.length; x++) {
                    if (arrayList[x].types[0] == 'route') {
                        $("#route").val(arrayList[x].long_name);
                    }
                    if (arrayList[x].types[0] == 'administrative_area_level_3') {
                        $('#kecamatan').val(arrayList[x].long_name);
                    }
                    if (arrayList[x].types[0] == 'administrative_area_level_2') {
                        $("#city").val(arrayList[x].long_name);
                    }
                    if (arrayList[x].types[0] == 'administrative_area_level_1') {
                        $("#provinsi").val(arrayList[x].long_name)
                    }
                }
            }
        })
        google.maps.event.addListener(markers, 'position_changed', function () {
            // geocoder.geocode({
            //     'latLng': currentLocation,
            // }, function(result,status){
            //     alert(result[1].formatted_address)
            // })
            var lat = markers.getPosition().lat();
            var lng = markers.getPosition().lng();
            $('#latitude').val(lat);
            $('#longitude').val(lng);
            $.ajax({
                url: "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lng + "&sensor=true&key=" + key, success: function (data) {
                    arrayList = data.results[0].address_components;
                    for (var x = 0; x < arrayList.length; x++) {
                        if (arrayList[x].types[0] == 'route') {
                            $("#route").val(arrayList[x].long_name);
                        }
                        if (arrayList[x].types[0] == 'administrative_area_level_3') {
                            $('#kecamatan').val(arrayList[x].long_name);
                        }
                        if (arrayList[x].types[0] == 'administrative_area_level_2') {
                            $("#city").val(arrayList[x].long_name);
                        }
                        if (arrayList[x].types[0] == 'administrative_area_level_1') {
                            $("#provinsi").val(arrayList[x].long_name)
                        }
                    }
                }
            })
        })
    }
    var input = document.getElementById('autocomplete');
    var autocomplete = new google.maps.places.SearchBox(input);

    google.maps.event.addListener(autocomplete, 'places_changed', function () {
        var places = autocomplete.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for (i = 0; place = places[i]; i++) {
            bounds.extend(place.geometry.location);
            markers.setPosition(place.geometry.location);
        }

        var lat = markers.getPosition().lat();
        var lng = markers.getPosition().lng();

        $('#latitude').val(lat);
        $('#longitude').val(lng);

        map.fitBounds(bounds);
        map.setZoom(15);

        google.maps.event.addListener(markers, 'position_changed', function () {
            var lat = markers.getPosition().lat();
            var lng = markers.getPosition().lng();
            $('#latitude').val(lat);
            $('#longitude').val(lng);
            $.ajax({
                url: "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lng + "&sensor=true&key=" + key, success: function (data) {
                    arrayList = data.results[0].address_components;
                    for (var x = 0; x < arrayList.length; x++) {
                        if (arrayList[x].types[0] == 'route') {
                            $("#route").val(arrayList[x].long_name);
                        }
                        if (arrayList[x].types[0] == 'administrative_area_level_3') {
                            $('#kecamatan').val(arrayList[x].long_name);
                        }
                        if (arrayList[x].types[0] == 'administrative_area_level_2') {
                            $("#city").val(arrayList[x].long_name);
                        }
                        if (arrayList[x].types[0] == 'administrative_area_level_1') {
                            $("#provinsi").val(arrayList[x].long_name)
                        }
                    }
                }
            })
        })
    });
}