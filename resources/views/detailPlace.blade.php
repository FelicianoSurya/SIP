@extends('layouts.app')

@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="flex flex-column w-100">
                <div class="detail-place flex flex-column align-items-start justify-content-center">
                    <div class="d-flex align-items-center">
                        <h1>Place : </h1><h2 class="p-3">{{ $data->name }}</h2>
                    </div>
                    <div class="d-flex align-items-center">
                        <h3>Address : </h3><h3 class="p-3">{{ $data->address }}</h3>
                    </div>
                    <div class="d-flex align-items-center">
                        <h4>PIC Phone Number : </h4><h4 class="p-3">{{ $data->phoneNumber }}</h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <h4>Place Type : </h4><h4 class="p-3">{{ $data->type->name }}</h4>
                    </div>
                </div>
                <div class="flex justify-content-center">
                <table class="table">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Provider Name</th>
                            <th>Address</th>
                            <th>PIC Place Phone Number</th>
                            <th>Place Type</th>
                            <th>Provider</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $x = 1 @endphp
                        @foreach($data as $dat)
                        <tr class="text-center align-middle">
                            <td>{{ $x }}</td>
                            <td>{{ $dat->name }}</td>
                            <td>{{ $dat->address }}</td>
                            <td>{{ $dat->phoneNumber }}</td>
                            <td>{{ $dat->type->name }}</td>
                            <td>
                                <a href="{{ url($dat->id) }}"><button type="button" class="btn btn-large btn-primary">Detail</button></a>
                            </td>
                            <!-- Modal -->
                            <!-- <div class="modal fade" id="modal-{{$dat->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">List Provider</h5>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body flex-column justify-content-center align-items-center">
                                    @foreach($dat->isp as $isp)
                                    <div class="row px-2 py-3">
                                        <div class="col-12">
                                            <div class="row">
                                                <p class="col-4 border border-dark">{{ $isp->isp->name }}</p>
                                                <p class="col-4 border border-dark">{{ $isp->isp->phoneNumber }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                            </div> -->
                        </tr>
                        @php $x = $x + 1 @endphp
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
