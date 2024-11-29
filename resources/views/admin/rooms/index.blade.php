@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>
            Rooms
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home | </a></li>
            <li class="active"> Rooms</li>
        </ol>
    </section>
    <hr>
    <button class="btn btn-primary"><a href="{{ route('rooms.create') }}" style="color: #fff;">
        <i class="bi bi-door-open"></i>Create</a></button>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Hotel Name</th>
                <th scope="col">Room name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Customer limit</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->hotel->name }}</td>
                    <td>{{ $room->name }}</td>
                    <td>
                        @if ($room->roomImages->count() > 0)
                            <img src="{{ asset($room->roomImages->first()->image_url) }}" alt="{{ $room->name }}"
                                class="img-thumbnail" width="100">
                        @else
                            <img src="{{ asset('default_image.jpg') }}" alt="No Image" class="img-thumbnail" width="100">
                        @endif
                    </td>
                    <td>{{ number_format($room->price) }}.VND</td>
                    <td>{{ $room->customer_limit }}</td>
                    <td>{{ App\Enums\RoomStatus::getDescription($room->status) }}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-success">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['rooms.destroy', $room->id]]) !!}
                            {!! Form::button('<i class="fa fa-trash"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger',
                                'onclick' => "return confirm('Bạn có muốn xóa không?')",
                            ]) !!}
                            {!! Form::close() !!}

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
