@extends('layouts.app')

@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="d-flex flex-column w-100 justify-content-center align-items-center">
        <h1 class="mb-5">Add Place</h1>
        <form method="POST" action="{{ route('addPlace') }}" class="w-50">
            @csrf
            <input type="hidden" name="userId" value="{{ Auth()->user()->id }}" name="userId">
            <div class="form-group d-flex flex-column">
                <label for="placeName">{{ __('Place Name') }}</label>
                <input type="text" class="form-control mb-3" name="name">
            </div>
            <div class="form-group d-flex flex-column">
                <label for="address">{{ __('Place Address') }}</label>
                <input type="text" class="form-control  mb-3" name="address">
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
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
</div>
@endsection
