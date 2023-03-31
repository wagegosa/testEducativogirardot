@extends('layouts.passwords')

@section('title', __('Reset Password'))
@section('ibox-content', __('Reset Password'))
@section('message')
    <p>Introduzca su dirección de correo electrónico y su contraseña se restablecerá y se le enviará por correo electrónico.</p>
@endsection

@section('form')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    {!! Form::open([
        'route' => 'password.email',
        'method' => 'post',
        'autocomplete' => 'off'
    ]) !!}
        <!-- Formulario -->
        <div class="mb-3">
            {!! Form::label('email', __('Email Address'), ['class' => 'form-label required']) !!}
            {!! Form::email('email', '', [
                'id' => 'email',
                'class' => 'form-control'.($errors->has('email') ? ' is-invalid' : null)
            ]) !!}
            @error('email')
            <span class="text-danger m-b-none">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-0">
            <button type="submit" class="btn btn-primary block full-width m-b">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    {!! Form::close() !!}
@endsection