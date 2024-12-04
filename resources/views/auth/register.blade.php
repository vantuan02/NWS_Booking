@extends('layout.client.master')
@section('content')
    <div class="rectangle-overlay">
    </div>
    <div class="content">
        {!! Form::open(['method' => 'POST', 'route' => ['register'], 'class' => 'form_log']) !!}
        <div class="form__content">
            <h1 class="form__title">Register your account</h1>
            <div class="form__inputs">
                <div class="form__input-container">
                    {!! Form::label('name', 'Name', ['class' => 'form__label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form__input', 'placeholder' => 'Enter your name']) !!}

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form__input-container">
                    {!! Form::label('email', 'Email', ['class' => 'form__label']) !!}
                    {!! Form::text('email', old('email'), ['class' => 'form__input', 'placeholder' => 'Enter your email']) !!}

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form__input-container">
                    {!! Form::label('phone', 'Phone number', ['class' => 'form__label']) !!}
                    {!! Form::text('phone', old('phone'), ['class' => 'form__input', 'placeholder' => 'Enter your phone']) !!}

                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form__input-container">
                            {!! Form::label('password', 'Password', ['class' => 'form__label']) !!}
                            {!! Form::password('password', ['class' => 'form__input', 'placeholder' => 'Enter your password']) !!}

                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form__input-container">
                            {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'form__label']) !!}
                            {!! Form::password('password_confirmation', ['class' => 'form__input', 'placeholder' => 'Enter your password']) !!}

                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__checkbox-container">
                {!! Form::checkbox('', 1, false, ['class' => 'form__checkbox', 'id' => 'remember']) !!}
                {!! Form::label('', 'I agree with privacy policy, Terms of service, Refund and Cancellation policy', [
                    'class' => 'form__checkbox-label',
                ]) !!}
            </div>
            <!-- Submit Button -->
            <div class="form__action">
                {!! Form::submit('Create an account', ['class' => 'form__button']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
