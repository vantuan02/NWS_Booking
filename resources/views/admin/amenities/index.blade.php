@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>
            Amenities
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home | </a></li>
            <li class="active"> Amenities</li>
        </ol>
    </section>
    <hr>
    <button class="btn btn-primary"><a href="{{ route('amenities.create') }}" style="color: #fff;">
            <i class="bi bi-display"></i>
            Create</a></button>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($amenities as $amenity)
                <tr>
                    <td>{{ $amenity->id }}</td>
                    <td>{{ $amenity->name }}</td>
                    <td>
                        <img src="{{ asset($amenity->image) }}" alt="{{ $amenity->name }}"
                            class="img-thumbnail" width="100">
                    </td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('amenities.edit', $amenity->id) }}" class="btn btn-success">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="{{ route('amenities.show', $amenity->id) }}" class="btn btn-info">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['amenities.destroy', $amenity->id]]) !!}
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
