@extends('layouts.app')

@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="d-flex flex-column w-100 justify-content-center align-items-center">
        <h1 class="mb-5">Edit Place</h1>
        <form method="POST" action="{{ route('postPlace') }}" class="w-50">
        @csrf
        <div class="form-group d-flex flex-column">
            <label for="placeName">{{ __('Place Name') }}</label>
            <input type="text" class="form-control mb-3" name="name" value="{{ $data->name }}">
        </div>
        <div class="form-group d-flex flex-column">
            <label for="phoneNumber">{{ __('Place PIC Phone Number') }}</label>
            <input type="text" class="form-control  mb-3" name="phoneNumber" value="{{ $data->phoneNumber }}">
        </div>
        <div class="form-group d-flex flex-column">
            <label for="typePlace">{{ __('Place Type') }}</label>
            <select name="typeId" class="form-control mb-3" id="typeId" name="typeId">
                <option value=""></option>
            @foreach($dataType as $type)
                @php if($data->typeId == $type->id){ @endphp
                <option value="{{ $type->id }}" selected="selected">{{ $type->name }}</option>
                @php }else{ @endphp
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @php } @endphp
            @endforeach
            </select>
        </div>
        <div class="form-group d-flex flex-column">
            <label for="address">{{ __('Place Address') }}</label>
            <input type="text" class="form-control  mb-3" name="address" value="{{ $data->address }}">
        </div>
        <div class="form-group d-flex flex-column">
            <label for="addressBox">{{ __('Place SearchBox') }}</label>            
            <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Enter Location">
        </div>  
        <div class="form-group d-flex flex-column" id="latitudeArea">
            <input type="hidden" id="latitude" name="latitude" class="form-control" value="{{ $data->latitude }}">
        </div>  
        <div class="form-group d-flex flex-column" id="longtitudeArea">
            <input type="hidden" name="longitude" id="longitude" class="form-control" value="{{ $data->longitude}}">
        </div>
        <div class="form-group d-flex flex-column" id="routeArea">
            <input type="hidden" name="route" id="route" class="form-control" value="{{ $data->route}}">
        </div>
        <div class="form-group d-flex flex-column" id="kecamatanArea">
            <input type="hidden" name="kecamatan" id="kecamatan" class="form-control" value="{{ $data->kecamatan}}">
        </div>
        <div class="form-group d-flex flex-column" id="provinsiArea">
            <input type="hidden" name="provinsi" id="provinsi" class="form-control" value="{{ $data->provinsi}}">
        </div>
        <div class="form-group d-flex flex-column" id="cityArea">
            <input type="hidden" name="city" id="city" class="form-control" value="{{ $data->city}}">
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