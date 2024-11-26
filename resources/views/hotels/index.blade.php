@extends('layout.admin.master')
@section('content')
    <button class="btn btn-primary"><a href="" style="color: #fff;">Create</a></button>
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
                    <td>{{ $hotel->description }}</td>
                    <td>{{ $hotel->address }}</td>
                    <td>
                        <a href="{{route('hotels.show', $hotel->id)}}">
                            {!! Form::button('Edit', ['class' => 'btn btn-success']) !!}
                        </a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['hotels.destroy', $hotel->id]]) !!}
                        {!! Form::submit('Delete', [
                            'class' => 'btn btn-danger',
                            'onclick' => "return confirm('Bạn có muốn xóa không?')",
                        ]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
