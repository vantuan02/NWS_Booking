@extends('layout.admin.master')
@section('content')
    <section class="content-header">
        <h1>
            Payment Methods
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home | </a></li>
            <li class="active"> Payment Methods</li>
        </ol>
    </section>
    <hr>
    <button class="btn btn-primary"><a href="{{ route('payment_methods.create') }}" style="color: #fff;">
            <i class="bi bi-display"></i>
            Create</a></button>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payMethods as $method)
                <tr>
                    <td>{{ $method->id }}</td>
                    <td>{{ $method->name }}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('payment_methods.edit', $method->id) }}" class="btn btn-success">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['payment_methods.destroy', $method->id]]) !!}
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
