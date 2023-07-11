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
                <a href="{{ url('findPlace') }}"><button class="btn btn-danger btn-md mb-3 ms-3" type="button">Find Provider</button></a>
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
