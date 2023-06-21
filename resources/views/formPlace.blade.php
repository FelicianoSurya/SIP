@extends('layouts.app')

@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="d-flex flex-column w-100 justify-content-center align-items-center">
        <h1 class="mb-5">Form Place</h1>
        <form method="POST" action="{{ route('postPlace') }}" class="w-50">
            @csrf
            <input type="hidden" name="userId" value="{{ Auth()->user()->id }}">
            <div classs="form-group d-flex flex-column">
                <label for="placeName" class="h3">{{ __('Place Name') }}</label>
                <input type="text" class="form-control">
            </div>

        </form>
    </div>
</div>
@endsection
