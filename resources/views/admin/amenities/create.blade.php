@extends('layout.admin.master')
@section('content')
    <section>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create amenity</title>
    </section>
    <hr>
    <H2>Create new amenity</H2>
    {!! Form::open(['method' => 'POST', 'route' => ['amenities.store'], 'enctype' => 'multipart/form-data']) !!}
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
                {!! Form::label('price', 'Price') !!}
                {!! Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => 'Please enter price']) !!}

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
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'id' => 'description']) !!}

            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection
