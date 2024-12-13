@extends('layout.ad.master')
@section('content')
    <div class="card card-body">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-space-between">
                    <h4 class="fw-semibold fs-4 mb-4 mb-md-0 card-title">Views</h4>
                    <nav aria-label="breadcrumb" class="ms-auto">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                    Views
                                </span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="product-list">
        <div class="card">
            <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-center gap-6 mb-9">
                    <button class="btn btn-primary"><a href="{{ route('admin.views.create') }}" style="color: #fff;">
                            <i class="bi bi-image-alt"></i> Create </a></button>
                </div>
                <div class="table-responsive border rounded">
                    <table class="table align-middle text-nowrap mb-0">
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
                                            <a href="{{ route('admin.views.edit', $view->id) }}" class="btn btn-success">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.views.destroy', $view->id]]) !!}
                                            {!! Form::button('<i class="bi bi-trash"></i>', [
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
                    <br>
                    <div class="d-flex align-items-center justify-content-end py-1">
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
