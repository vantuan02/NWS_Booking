@extends('layout.admin.master')
@section('content')
    <section>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update view</title>
    </section>
    <hr>
    <H2>Update view</H2>
    {!! Form::open(['method' => 'PUT', 'route' => ['views.update', $view->id], 'enctype' => 'multipart/form-data']) !!}
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
    {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection
