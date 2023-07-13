@extends('layouts.app')
@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
<div class="d-flex justify-content-between">
    <h1>Location Types</h1>
    <button class="btn btn-info text-white btn-md mb-3" type="button" data-bs-toggle="modal" data-bs-target="#modalAdd">Add Type</button>
</div>
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelleby="modalAdd" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('postType') }}" class="w-100">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Add Type</h5>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body flex-column justify-content-center align-items-center">
                    @csrf
                    <div classs="form-group d-flex flex-column">
                        <label for="typeName">{{ __('Name') }}</label>
                        <input type="text" class="form-control mb-3" name="name">
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
            <button class="btn btn-primary btn-md" type="button" data-bs-toggle="modal" data-bs-target="{{'#modalEditType-' . $dat->id}}">Edit Type</button>
            <div class="modal fade" id="{{'modalEditType-' . $dat->id}}" tabindex="-1" role="dialog" aria-labelleby="modalAdd" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="POST" action="{{ url('/type/edit') }}" class="w-100">
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
                    <a href="{{ '/type/delete' . '/' . $dat->id }}" class="btn btn-danger btn-md">Delete</a>
                </td>
        </tr>
        @php $x = $x + 1 @endphp
        @endforeach
    </tbody>
</table>
</div>
@endsection