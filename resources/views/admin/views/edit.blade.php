@extends('layout.ad.master')
@section('content')
    <div class="card card-body">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-space-between">
                    <h4 class="fw-semibold fs-4 mb-4 mb-md-0 card-title">Update view</h4>
                    <nav aria-label="breadcrumb" class="ms-auto">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                    Update view
                                </span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-3">
            <H2>Update view</H2>
            {!! Form::open(['method' => 'PUT', 'route' => ['admin.views.update', $view->id], 'enctype' => 'multipart/form-data']) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', $view->name, ['class' => 'form-control', 'placeholder' => 'Please enter name']) !!}

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('image', 'Amenity image') !!}
                        {!! Form::file('image', ['class' => 'form-control']) !!}

                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <div class="image-gallery">
                            @if ($view->image && file_exists(public_path($view->image)))
                                <img src="{{ asset($view->image) }}" alt="view Image" class="img-preview">
                            @else
                                <span class="no-images">Không có ảnh</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', $view->description, ['class' => 'form-control', 'id' => 'description']) !!}

                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <br>
            {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
