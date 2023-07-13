@extends('layouts.app')
@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
<div class="d-flex justify-content-between">
    <h1>User Details</h1>
    <button class="btn btn-info text-white btn-md mb-3" type="button" data-bs-toggle="modal" data-bs-target="#modalAdd">Add User</button>
</div>
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelleby="modalAdd" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('postUser') }}" class="w-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Add User</h5>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body flex-column justify-content-center align-items-center">
                        @csrf
                        <div classs="form-group d-flex flex-column">
                            <label for="placeName">{{ __('Full Name') }}</label>
                            <input type="text" class="form-control mb-3" name="name">
                        </div>
                        <div classs="form-group d-flex flex-column">
                            <label for="phoneNumber">{{ __('Phone Number') }}</label>
                            <input type="text" class="form-control  mb-3" name="phoneNumber">
                        </div>
                        <div classs="form-group d-flex flex-column">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="text" class="form-control  mb-3" name="email">
                        </div>
                        <div classs="form-group d-flex flex-column">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" class="form-control  mb-3" id="password">
                        </div>
                        <div classs="form-group d-flex flex-column">
                            <p class="text-danger d-none" id="conf">Confirmation Password Belum Sesuai</p>
                            <label for="password">{{ __('Confirmation Password') }}</label>
                            <input type="password" class="form-control  mb-3" name="password" id="confirmation" onfocusout="confirmationPassword()">
                        </div>
                        <div classs="form-group d-flex flex-column">
                            <label for="role">{{ __('Role') }}</label>
                            <select name="role" id="role" class="form-control">
                                <option value="employee">Employee</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="button" class="btn btn-primary" disabled>Save</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                    <a href="{{ '/user/delete' . '/' . $dat->id }}" class="btn btn-danger btn-md">Delete</a>
                </td>
        </tr>
        @php $x = $x + 1 @endphp
        @endforeach
    </tbody>
</table>
</div>
@endsection

@section('custom-js')
<script>
    function confirmationPassword(){
        var pass = $("#password").val();
        var conf = $("#confirmation").val();
        console.log(pass + conf)

        if(pass != conf){
            $('#conf').removeClass("d-none");
        }else{
            $("#conf").addClass("d-none");
            $("#button").attr("disabled", false)
        }
    }
</script>
@endsection