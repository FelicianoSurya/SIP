@extends('layouts.app')
@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <h1>ISP List</h1>
    <button class="btn btn-danger btn-md mb-3" type="button" data-bs-toggle="modal" data-bs-target="#modalAdd">Add Place</button>
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelleby="modalAdd" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('createIsp') }}" class="w-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Add Place</h5>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body flex-column justify-content-center align-items-center">
                        @csrf
                        <div class="form-group d-flex flex-column">
                            <label for="ispName">{{ __('Isp Name') }}</label>
                            <input type="text" class="form-control mb-3" name="name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
            <div class="modal fade" id="{{'modalEditProvider-' . $dat->id}}" tabindex="-1" role="dialog" aria-labelleby="modalAdd" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="POST" action="{{ url('/provider/edit') }}" class="w-100">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Edit Type</h5>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body flex-column justify-content-center align-items-center">
                                @csrf
                                <input type="hidden" name="id" value="{{ $dat->id }}">
                                <div classs="form-group d-flex flex-column">
                                    <label for="typeName">{{ __('Name') }}</label>
                                    <input type="text" class="form-control mb-3" name="name" value="{{ $dat->name }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="button" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <a href="{{ '/isp/delete' . '/' . $dat->id }}" class="btn btn-danger btn-md">Delete</a>
                </td>
        </tr>
        @php $x = $x + 1 @endphp
        @endforeach
    </tbody>
</table>
</div>
@endsection