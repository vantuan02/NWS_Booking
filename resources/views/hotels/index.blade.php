@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>
            Hotels
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home | </a></li>
            <li class="active"> Hotels</li>
        </ol>
    </section>
    <hr>
    <button class="btn btn-primary"><a href="{{ route('hotels.create') }}" style="color: #fff;"><i
                class="bi bi-building-fill-add"></i> Create</a></button>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>
                        @if ($hotel->hotelImages->count() > 0)
                            <img src="{{ asset($hotel->hotelImages->first()->image_url) }}" alt="{{ $hotel->name }}"
                                class="img-thumbnail" width="100">
                        @else
                            <img src="{{ asset('default_image.jpg') }}" alt="No Image" class="img-thumbnail" width="100">
                        @endif
                    </td>
                    <td>{{ $hotel->address }}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-success">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['hotels.destroy', $hotel->id]]) !!}
                            {!! Form::button('<i class="fa fa-trash"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger',
                                'onclick' => "return confirm('Bạn có muốn xóa không?')",
                            ]) !!}
                            {!! Form::close() !!}

                        </div>
                    </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
