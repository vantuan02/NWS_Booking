@extends('layout.admin.master')
@section('content')
    <section>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create amenity</title>
    </section>
    <hr>
    <H2>Create new amenity</H2>
    {!! Form::open(['method' => 'PUT', 'route' => ['amenities.update',$amenity->id], 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', $amenity->name, ['class' => 'form-control', 'placeholder' => 'Please enter name']) !!}

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('price', 'Price') !!}
                {!! Form::text('price', $amenity->price, ['class' => 'form-control', 'placeholder' => 'Please enter price']) !!}

                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('image', 'Amenity image') !!}
            {!! Form::file('image', ['class' => 'form-control']) !!}

            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            <div class="image-gallery">
                @if ($amenity->image && file_exists(public_path($amenity->image)))
                    <img src="{{ asset($amenity->image) }}" alt="Amenity Image" class="img-preview">
                @else
                    <span class="no-images">Không có ảnh</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', $amenity->description, ['class' => 'form-control', 'id' => 'description']) !!}

            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection