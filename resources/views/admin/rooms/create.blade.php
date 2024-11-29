@extends('layout.admin.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Room</title>
    </head>

    <body>
        {!! Form::open(['method' => 'POST', 'route' => ['rooms.store'], 'enctype' => 'multipart/form-data']) !!}
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

            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('customer_limit', 'Customer limit') !!}
                    {!! Form::text('customer_limit', old('customer_limit'), [
                        'class' => 'form-control',
                        'placeholder' => 'Please enter customer limit',
                    ]) !!}

                    @error('customer_limit')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('price', 'Price') !!}
                    {!! Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => 'Please enter price']) !!}
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'id' => 'description']) !!}

            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('detail', 'Detail') !!}
            {!! Form::textarea('detail', old('detail'), ['class' => 'form-control', 'id' => 'detail-des']) !!}

            @error('detail')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('images[]', 'Room Images') !!}
            {!! Form::file('images[]', ['class' => 'form-control', 'multiple' => true]) !!}
            <small class="text-muted">You can upload multiple images</small>

            @error('images.*')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::select('hotel_id', $hotels, old('hotel_id'), [
                        'class' => 'form-control',
                        'placeholder' => '-- Select hotel --',
                    ]) !!}
                    @error('hotel_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::select('status', $statusOptions, old('status'), [
                        'class' => 'form-control',
                        'placeholder' => '-- Select status --',
                    ]) !!}
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </body>

    </html>
@endsection
