@extends('layouts.app')
@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
<h1>User Details</h1>
<table class="table">
    <thead>
        <tr class="text-center">
            <th>#</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php $x = 1 @endphp
        @foreach($data as $dat)
        <tr class="text-center">
            <th scope="row">{{ $x }}</th>
                <td>{{$dat->name}}</td>
                <td>{{$dat->phoneNumber}}</td>
                <td>{{$dat->user->email}}</td>
                <td class="align-middle">
            <button class="btn btn-primary btn-md" type="button" data-bs-toggle="modal" data-bs-target="{{'#modalEditProvider-' . $dat->id}}">Edit User</button>
                    <a href="{{ '/user/delete' . '/' . $dat->id }}" class="btn btn-danger btn-md">Delete</a>
                </td>
        </tr>
        @php $x = $x + 1 @endphp
        @endforeach
    </tbody>
</table>
</div>
@endsection
