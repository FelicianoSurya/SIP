@extends('layouts.app')

@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
<h1>Location Details</h1>
<a href="{{ url('/place' . '/' . $data->id . '/edit') }}"><button class="btn btn-primary btn-md" type="button">Edit Place</button></a>    
<!-- Modal -->
<div class="modal fade" id="modalEditPlace" tabindex="-1" role="dialog" aria-labelleby="modalEditPlace" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ url('/place' . '/' . $data->id . '/editPlace' ) }}" class="w-100">
            <input type="hidden" name="id" value="{{ $data->id }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Provider</h5>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body flex-column justify-content-center align-items-center">
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
    </div>
@php if($row > 0){ @endphp
    <a href="{{ '/place' . '/' . $data->id . '/clearProvider' }}"><button class="btn btn-danger">Clear All Provider</button></a>
@php }else{ @endphp
    <a href="{{ '/place' . '/' . $data->id . '/deletePlace' }}"><button class="btn btn-danger">Delete Place</button></a>
@php } @endphp
<table class="table">
    <tbody>
        <tr>
            <th>Name</th>
            <td>{{$data->name}}</td>
        </tr>
        <tr>
            <th>PIC Place Phone Number</th>
            <td>{{$data->phoneNumber}}</td>
        </tr>
        <tr>
            <th>Provinsi</th>
            <td>{{$data->provinsi}}</td>
        </tr>
        <tr>
            <th>Kota</th>
            <td>{{$data->city}}</td>
        </tr>
        <tr>
            <th>Kecamatan</th>
            <td>{{$data->kecamatan}}</td>
        </tr>
        <tr>
            <th>Jalan</th>
            <td>{{$data->route}}</td>
        </tr>
        <tr>
            <th>Place Type</th>
            <td>{{$data->type->name}}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{$data->address}}</td>
        </tr>
    </tbody>
</table>
<button class="btn btn-danger btn-md mb-3" type="button" data-bs-toggle="modal" data-bs-target="#modalAddProvider">Add Provider</button>
    <!-- Modal -->
    <div class="modal fade" id="modalAddProvider" tabindex="-1" role="dialog" aria-labelleby="modalAddProvider" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('postProvider') }}" class="w-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Add Provider</h5>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body flex-column justify-content-center align-items-center">
                        @csrf
                        <input type="hidden" name="placeId" value="{{ $placeId }}">
                        <div class="form-group d-flex flex-column">
                            <label for="providerName">{{ __('Provider') }}</label>
                            <select name="ispId" class="form-control mb-3">
                                <option value=""></option>
                                @foreach($ispData as $x)
                                <option value="{{ $x->id }}">{{ $x->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column">
                            <label for="phoneNumber">{{ __('PIC Phone Number') }}</label>
                            <input type="text" class="form-control  mb-3" name="phoneNumber">
                        </div>
                        <div class="form-group d-flex flex-column">
                            <label for="pic_name">{{ __('PIC Name') }}</label>
                            <input type="text" class="form-control  mb-3" name="pic_name">
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
<h1>Provider Details</h1>
<table class="table">
    <thead>
        <tr class="text-center">
            <th>#</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>PIC Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php $x = 1 @endphp
        @foreach($isp as $dat)
        <tr class="text-center">
            <td scope="row">{{ $x }}</td>
                <td class="align-middle">{{$dat->isp->name}}</td>
                <td class="align-middle">{{$dat->phoneNumber}}</td>
                <td class="align-middle">{{$dat->pic_name}}</td>
                <td class="align-middle">
            <button class="btn btn-primary btn-md" type="button" data-bs-toggle="modal" data-bs-target="{{'#modalEditProvider-' . $dat->id}}">Edit Provider</button>
                    <a href="{{ '/provider/delete' . '/' . $dat->id }}" class="btn btn-danger btn-md">Delete</a>
                </td>
                <!-- Modal -->
                <div class="modal fade" id="{{'modalEditProvider-' . $dat->id}}" tabindex="-1" role="dialog" aria-labelleby="modalEditProvider" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form class="w-100">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Provider</h5>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body flex-column justify-content-center align-items-center">
                                    <input type="hidden" name="placeId" value="{{ $placeId }}" id="placeId">
                                    <div class="form-group d-flex flex-column">
                                        <label for="providerName">{{ __('Provider') }}</label>
                                        <select name="ispId" class="form-control mb-3" id="{{ 'ispId-' . $dat->id }}">
                                            <option value=""></option>
                                            @foreach($ispData as $xi)
                                                @php if($dat->isp->id == $xi->id){ @endphp
                                                <option value="{{ $xi->id }}" selected="selected">{{ $xi->name }}</option>
                                                @php }else{ @endphp
                                                <option value="{{ $xi->id }}">{{ $xi->name }}</option>
                                                @php } @endphp
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                        <label for="phoneNumber">{{ __('PIC Phone Number') }}</label>
                                        <input type="text" class="form-control  mb-3" name="phoneNumber" value="{{$dat->phoneNumber}}" id="{{ 'phoneNumber-' . $dat->id }}">
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                        <label for="pic_name">{{ __('PIC Name') }}</label>
                                        <input type="text" class="form-control  mb-3" name="pic_name" value="{{$dat->pic_name}}" id="{{ 'picName-' . $dat->id }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="editProvider({{ $dat->id }})" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>   
         </tr>
        @php $x = $x + 1 @endphp
        @endforeach
    </tbody>
</table>
</div>
@endsection

@section('custom-js')
   <script>
        function editProvider(id){
            var _placeId = document.getElementById("placeId").value;
            var _ispId = document.getElementById("ispId-" + id).value;
            var _phoneNumber = document.getElementById("phoneNumber-" + id).value;
            var _picName = document.getElementById("picName-" + id).value;
            console.log(_placeId + _ispId + _phoneNumber + _picName);
            $.ajax({
                type: "POST",
                url: "http://localhost:8000/place/editProvider",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    placeId: _placeId,
                    ispId: _ispId,
                    phoneNumber: _phoneNumber,
                    pic_name: _picName
                },
                dataType : "JSON",
                success: function(data){
                    alert('success');
                    location.reload();
                },
                error : function(xhr){
                    alert('error');
                    console.log(xhr);
                }
            });
        }
   </script>
@endsection