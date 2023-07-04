@extends('layouts.app')
@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
<h1>ISP List</h1>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php $x = 1 @endphp
        @foreach($data as $dat)
        <tr>
            <th scope="row">{{ $x }}</th>
                <td>{{$dat->name}}</td>
                <td class="align-middle">
            <button class="btn btn-primary btn-md" type="button" data-bs-toggle="modal" data-bs-target="{{'#modalEditProvider-' . $dat->id}}">Edit ISP</button>
                    <a href="{{ '/isp/delete' . '/' . $dat->id }}" class="btn btn-danger btn-md">Delete</a>
                </td>
        </tr>
        @php $x = $x + 1 @endphp
        @endforeach
    </tbody>
</table>
</div>
@endsection