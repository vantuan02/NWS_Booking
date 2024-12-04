@extends('layout.client.master')
@section('content')
    <div class="rectangle-overlay">
    </div>
    <div class="content">
        {!! Form::open(['method' => 'POST', 'route' => ['login'], 'class' => 'form_log']) !!}
        <div class="form__content">
            <h1 class="form__title">Sign In Account</h1>
            <div class="form__inputs">
                <!-- Email Input -->
                <div class="form__input-container">
                    {!! Form::label('email', 'Email Address', ['class' => 'form__label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form__input', 'placeholder' => 'Enter your email']) !!}
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="form__input-container">
                    {!! Form::label('password', 'Password', ['class' => 'form__label']) !!}
                    {!! Form::password('password', ['class' => 'form__input', 'placeholder' => 'Enter your password']) !!}

                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Remember Me Checkbox -->
            <div class="form__checkbox-container">
                {!! Form::checkbox('remember', 1, false, ['class' => 'form__checkbox', 'id' => 'remember']) !!}
                {!! Form::label('remember', 'Remember Me', ['class' => 'form__checkbox-label']) !!}
            </div>

            <!-- Forgot Password Link -->
            <div class="form__forgot-password">
                <a href="" class="form__forgot-link">Forgot Password?</a>
            </div>

            <!-- Submit Button -->
            <div class="form__action">
                {!! Form::submit('Sign In Account', ['class' => 'form__button']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
