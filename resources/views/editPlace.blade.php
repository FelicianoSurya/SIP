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
            <label for="address">{{ __('Place Address') }}</label>
            <input type="text" class="form-control  mb-3" name="address" value="{{ $data->address }}">
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
        </form>
    </div>
</div>
@endsection