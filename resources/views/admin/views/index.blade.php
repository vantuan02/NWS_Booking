@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>
            Views
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home | </a></li>
            <li class="active"> Views</li>
        </ol>
    </section>
    <hr>
    <button class="btn btn-primary"><a href="{{ route('views.create') }}" style="color: #fff;">
            <i class="bi bi-image-alt"></i> Create </a></button>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($views as $view)
                <tr>
                    <td>{{ $view->id }}</td>
                    <td>{{ $view->name }}</td>
                    <td>
                        <img src="{{ asset($view->image) }}" alt="{{ $view->name }}" class="img-thumbnail"
                            width="100">
                    </td>
                    <td>{!! $view->description !!}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('views.edit', $view->id) }}" class="btn btn-success">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['views.destroy', $view->id]]) !!}
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
