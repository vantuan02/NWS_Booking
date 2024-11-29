@extends('layout.admin.master')
@section('content')
    <section>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create hotel</title>
    </section>
    <hr>
    <H2>Create new hotel</H2>
    {!! Form::open(['method' => 'POST', 'route' => ['hotels.store'], 'enctype' => 'multipart/form-data']) !!}
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
    {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection
