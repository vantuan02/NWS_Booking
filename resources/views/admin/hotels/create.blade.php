@extends('layout.ad.master')
@section('content')
    <div class="card card-body">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-space-between">
                    <h4 class="fw-semibold fs-4 mb-4 mb-md-0 card-title">Create hotel</h4>
                    <nav aria-label="breadcrumb" class="ms-auto">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                    Create hotel
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
            {!! Form::open(['method' => 'POST', 'route' => ['admin.hotels.store'], 'enctype' => 'multipart/form-data']) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Please enter name']) !!}

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('address', 'Address') !!}
                        {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => 'Please enter address']) !!}

                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('images[]', 'Hotel Images') !!}
                    {!! Form::file('images[]', ['class' => 'form-control', 'multiple' => true]) !!}
                    <small class="text-muted">You can upload multiple images</small>

                    @error('images.*')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'id' => 'description']) !!}

                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <br>
            {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
