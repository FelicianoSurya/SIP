@extends('layouts.app')

@section('custom-css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex r-100 justify-content-end align-items-center">
                <a href="{{ url('addPlace') }}"><button class="btn btn-danger btn-md mb-3" type="button">Add Place</button></a>
                        <!-- Modal -->
                        <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelleby="modalAdd" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <form method="POST" action="{{ route('postPlace') }}" class="w-100">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Add Place</h5>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body flex-column justify-content-center align-items-center">
                                @csrf
                                <input type="hidden" name="userId" value="{{ Auth()->user()->id }}" name="userId">
                                <div class="form-group d-flex flex-column">
                                    <label for="placeName">{{ __('Place Name') }}</label>
                                    <input type="text" class="form-control mb-3" name="name">
                                </div>
                                <div class="form-group d-flex flex-column">
                                    <label for="address">{{ __('Place Address') }}</label>
                                    <input type="text" class="form-control  mb-3" name="address">
                                </div>
                                <div class="form-group d-flex flex-column">
                                    <label for="phoneNumber">{{ __('Place PIC Phone Number') }}</label>
                                    <input type="text" class="form-control  mb-3" name="phoneNumber">
                                </div>
                                <div class="form-group d-flex flex-column">
                                    <label for="typePlace">{{ __('Place Type') }}</label>
                                    <select name="typeId" class="form-control mb-3" id="typeId" name="typeId">
                                        <option value=""></option>
                                    @foreach($dataType as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div classs="form-group d-flex flex-column">
                                    <label for="latitude">{{ __('Latitude') }}</label>
                                    <input type="text" class="form-control  mb-3" name="latitude" id="address-latitude" value="0">
                                </div>
                                <div classs="form-group d-flex flex-column">
                                    <label for="longitude">{{ __('Longitude') }}</label>
                                    <input type="text" class="form-control  mb-3" name="langitude" id="address-longitude" value="0">
                                </div>
                                <div classs="form-group d-flex flex-column">
                                    <label for="autocomplete">{{ __('') }}</label>
                                    <input type="text" class="form-control map-input mb-3" name="autocomplete" id="address-input">
                                </div>
                                <div id="address-map-container" style="width:100%;height:400px; ">
                                    <div style="width: 100%; height: 100%" id="address-map"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>#</th>
                        <th>Location Names</th>
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
                            <a href="{{ url('place') . '/' . $dat->id  }}"><button type="button" class="btn btn-large btn-primary">Detail</button></a>
                        </td>

                    </tr>
                    @php $x = $x + 1 @endphp
                    @endforeach
                </tbody>
            </table>    
            {!! $data->links() !!}
        </div>
    </div>
</div>
@endsection
