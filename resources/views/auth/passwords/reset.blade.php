@extends('layouts.passwords')

@section('title', __('Reset Password'))

@section('ibox-content', __('Reset Password'))

@section('form')
    {!! Form::open([
        'class' => 'm-t',
        'role' => "form",
        'route' => 'password.update',
        'method' => 'post',
        'autocomplete' => 'off'
    ]) !!}
        <!-- Formulario -->
        {!! Form::hidden('token', $token, ['id' => 'token']) !!}
        <div class="mb-3">
            {!! Form::label('email', __('Email Address'), ['class' => 'form-label required']) !!}
            {!! Form::email(
                'email', '',
                ['id' => 'email',
                'class' => 'form-control'.($errors->has('email') ? ' is-invalid' : null)]) !!}
            @error('email')
            <span class="text-danger m-b-none">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label(
                'password',
                __('Password'),
                ['class' => 'form-label required'
            ]) !!}
            {!! Form::password('password', [
                'id' => 'password',
                'class' => 'form-control'.($errors->has('password') ? ' is.invalid' : null)
            ]) !!}
            @error('password')
            <span class="text-danger m-b-none">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label(
                'password-confirm',
                __('Confirm Password'),
                ['class' => 'form-label required']) !!}
            {!! Form::password(
                'password_confirmation',
                ['id' => 'password-confirm', 'class' => 'form-control']) !!}
        </div>
        <button type="submit"
                class="btn btn-primary block full-width m-b">
            {{ __('Reset Password') }}
        </button>
    {!! Form::close() !!}
@endsection