@extends('layouts.app')

@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
<h1>Location Details</h1>
<table class="table">
    <tbody>
        <tr>
            <th>Name</th>
            <td>{{$data->name}}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{$data->address}}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{{$data->phoneNumber}}</td>
        </tr>
        <tr>
            <th>Place Type</th>
            <td>{{$data->type->name}}</td>
        </tr>
    </tbody>
</table>

<h1>Provider Details</h1>
<table class="table">
    <thead>
        <tr class="text-center">
            <th>#</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>PIC Name</th>
        </tr>
    </thead>
    <tbody>
        @php $x = 1 @endphp
        @foreach($data->isp as $dat)
        <tr class="text-center">
            <th scope="row">{{ $x }}</th>
                <td>{{$dat->isp->name}}</td>
                <td>{{$dat->isp->phoneNumber}}</td>
                <td>tes</td>
        </tr>
        @php $x = $x + 1 @endphp
        @endforeach
    </tbody>
</table>
</div>
@endsection
