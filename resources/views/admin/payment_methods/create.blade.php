@extends('layout.admin.master')
@section('content')
    <section>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create payment method</title>
    </section>
    <hr>
    <H2>Create new payment method</H2>
    {!! Form::open(['method' => 'POST', 'route' => ['payment_methods.store']]) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Please enter name payment method']) !!}

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection
