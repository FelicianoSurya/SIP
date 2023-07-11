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
                <label for="address">{{ __('Place Address (Detail)' ) }}</label>
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
            <div class="form-group d-flex flex-column" id="routeArea">
                <input type="hidden" name="route" id="route" class="form-control">
            </div>
            <div class="form-group d-flex flex-column" id="kecamatanArea">
                <input type="hidden" name="kecamatan" id="kecamatan" class="form-control">
            </div>
            <div class="form-group d-flex flex-column" id="provinsiArea">
                <input type="hidden" name="provinsi" id="provinsi" class="form-control">
            </div>
            <div class="form-group d-flex flex-column" id="cityArea">
                <input type="hidden" name="city" id="city" class="form-control">
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
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>
<script type="text/javascript" src="{{ asset('js/mapInput.js') }}"></script>
@endsection