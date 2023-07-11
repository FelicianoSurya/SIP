@extends('layouts.app')

@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container d-flex flex-column align-items-center w-100">
    <div class="flex w-50 justify-content-center align-items-center">
        <h1 class="text-center">Find Provider</h1>
        <form class="w-100">
            <div class="form-group d-flex flex-column">
                <label for="placeName">{{ __('Place Name') }}</label>
                <select name="name" id="name" class="form-control mb-3">
                    <option value=""></option>
                    @foreach($data as $x)
                    <option value="{{ $x->id }}">{{ $x->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group d-flex flex-column">
                <label for="address">{{ __('Jalan') }}</label>
                <select name="route" id="route" class="form-control mb-3">
                    <option value=""></option>
                    @foreach($jalan as $a)
                    <option value="{{ $a->route }}">{{ $a->route }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group d-flex flex-column">
                <label for="radius">{{ __('Radius') }}</label>
                <input type="number" class="form-control  mb-3" id="radius" name="phoneNumber">
            </div>
            <div class="d-flex justify-content-center">
                <button type="button" onclick="findPlace()" class="btn btn-danger btn-lg">Find</button>
            </div>
        </form>
    </div>
    <div class="d-flex justify-content-center align-items-center mt-5 w-100">
        <table class="table table-bordered" id="data">

        </table>
    </div>
</div>
@endsection

@section('custom-js')
<script>
    function elementFromHtml(html){
        const template = document.createElement("template");
        template.innerHTML = html.trim();
        return template.content.firstElementChild;
    }
    function distance(p1,p2){
        var R = 6378.137; // Radius of earth in KM
        var dLat = (p2.latitude * Math.PI) / 180 - (p1.latCenter * Math.PI) / 180;
        var dLon = (p2.longitude * Math.PI) / 180 - (p1.lngCenter * Math.PI) / 180;
        var a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos((p1.latCenter * Math.PI) / 180) *
            Math.cos((p2.latitude * Math.PI) / 180) *
            Math.sin(dLon / 2) *
            Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c;
        console.log(d);
        return d;
    }
    function findPlace(){
        var placeId = $("#name").val();
        var radius = $("#radius").val();
        var route = $("#route").val();
        var table = document.querySelector('#data');
        let html_template = `
        <tr>
            <th>Venue Name</th>
            <th>Jalan</th>
            <th>Kecamatan</th>
            <th>Kota</th>
            <th>Provinsi</th>
            <th>PIC Provider Name</th>
            <th>PIC Provider Number</th>
            <th>Provider</th>
        </tr>`;
        if(placeId != ""){
        $.ajax({
            type: "GET",
            url: "http://localhost:8000/findPlace/search/" + placeId,
            dataType: "JSON",
            success: function(data){
                    console.log(data);
                    var places = data.data;
                    var latitude = data.place.latitude;
                    var longitude = data.place.longitude;
                    var point = {latitude, longitude}
                    var dataPlaces = [];
                    var data = [];
                    for(var i = 0; i < places.length; i++){
                        var dataObject = {
                            name : "",
                            route : "",
                            kecamatan : "",
                            city : "",
                            provinsi : "",
                            provider : []
                        }
                        var latCenter = places[i].latitude;
                        var lngCenter = places[i].longitude;
                        var center = {latCenter, lngCenter};
                        var radiusArea = radius;
                        const dis = distance(center, point);
                        if (dis > radiusArea || dis == 0) {
                            console.log("false");
                        } else {
                            dataObject.name = places[i].name;
                            dataObject.route = places[i].route;
                            dataObject.kecamatan = places[i].kecamatan;
                            dataObject.city = places[i].city;
                            dataObject.provinsi = places[i].provinsi;
                            dataObject.provider = places[i].isp;
                            dataPlaces.push(dataObject);
                        }
                    }
                    if(route != ""){
                        data = dataPlaces;
                        dataPlaces = [];
                        for(var b = 0 ; b < data.length; b++){
                            var dataObject = {
                                name : "",
                                route : "",
                                kecamatan : "",
                                city : "",
                                provinsi : "",
                                provider : []
                            }
                            if(data[b].route == route){
                                dataObject.name = data[b].name;
                                dataObject.route = data[b].route;
                                dataObject.kecamatan = data[b].kecamatan;
                                dataObject.city = data[b].city;
                                dataObject.provinsi = data[b].provinsi;
                                dataObject.provider = data[b].provider;
                                dataPlaces.push(dataObject);
                            }
                        }
                    }
                    console.log(dataPlaces);
                    for(let x = 0; x < dataPlaces.length; x++){
                        var providerNumber = dataPlaces[x].provider.length;
                        if(providerNumber == 0){
                            providerNumber = 1;
                        }
                        html_template +=
                        `<tr>
                            <td class="align-middle text-center" rowspan=${providerNumber}>${dataPlaces[x].name}</td>
                            <td class="align-middle text-center" rowspan=${providerNumber}>${dataPlaces[x].route}</td>
                            <td class="align-middle text-center" rowspan=${providerNumber}>${dataPlaces[x].kecamatan}</td>
                            <td class="align-middle text-center" rowspan=${providerNumber}>${dataPlaces[x].city}</td>
                            <td class="align-middle text-center" rowspan=${providerNumber}>${dataPlaces[x].provinsi}</td>`;
                        if(dataPlaces[x].provider.length == 0){
                            html_template += 
                            `
                            <td class="text-center align-middle">-</td>
                            <td class="text-center align-middle">-</td>
                            <td class="text-center align-middle">-</td>
                        </tr>`
                        }
                        for(let a = 0; a < dataPlaces[x].provider.length; a++){
                            html_template += 
                            `
                            <td class="text-center align-middle">${dataPlaces[x].provider[a].pic_name }</td>
                            <td class="text-center align-middle">${dataPlaces[x].provider[a].phoneNumber }</td>
                            <td class="text-center align-middle">${dataPlaces[x].provider[a].isp.name }</td>
                        </tr>`   
                        }
                    }
                    table.innerHTML = html_template;
                },
                error : function(xhr){
                    console.log(xhr)
                }
            })
        }else if(placeId == "" && route != ""){
            $.ajax({
                type: "GET",
                url: "http://localhost:8000/findPlace/searchRoute/" + route,
                dataType: "JSON",
                success: function(data){
                    var places = data.data;
                    for(let x = 0; x < places.length; x++){
                        var providerNumber = places[x].isp.length;
                        if(providerNumber == 0){
                            providerNumber = 1;
                        }
                        html_template +=
                        `<tr>
                            <td class="align-middle text-center" rowspan=${providerNumber}>${places[x].name}</td>
                            <td class="align-middle text-center" rowspan=${providerNumber}>${places[x].route}</td>
                            <td class="align-middle text-center" rowspan=${providerNumber}>${places[x].kecamatan}</td>
                            <td class="align-middle text-center" rowspan=${providerNumber}>${places[x].city}</td>
                            <td class="align-middle text-center" rowspan=${providerNumber}>${places[x].provinsi}</td>`;
                        if(places[x].isp.length == 0){
                            html_template += 
                            `
                            <td class="text-center align-middle">-</td>
                            <td class="text-center align-middle">-</td>
                            <td class="text-center align-middle">-</td>
                        </tr>`
                        }
                        for(let a = 0; a < places[x].isp.length; a++){
                            html_template += 
                            `
                            <td class="text-center align-middle">${places[x].isp[a].pic_name }</td>
                            <td class="text-center align-middle">${places[x].isp[a].phoneNumber }</td>
                            <td class="text-center align-middle">${places[x].isp[a].isp.name }</td>
                        </tr>`   
                        }
                    }
                    table.innerHTML = html_template;
                },
                error : function(xhr){
                    console.log(xhr)
                }
            });
        }
        }
</script>
@endsection