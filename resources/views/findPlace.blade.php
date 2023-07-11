@extends('layouts.app')

@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container d-flex flex-column align-items-center w-100">
    <div class="flex w-50 justify-content-center align-items-center">
        <h1 class="text-center">Find Provider</h1>
        <form method="POST" class="w-100">
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
                <label for="radius">{{ __('Radius') }}</label>
                <input type="number" class="form-control  mb-3" id="radius" name="phoneNumber">
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-danger btn-lg">Find</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('custom-js')

@endsection