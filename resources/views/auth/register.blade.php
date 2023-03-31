@extends('layouts.register')

@section('form-login')
    {!! Form::open([
        'class' => 'm-t b-r-xs',
        'route' => 'register',
        'method' => 'post',
        'autocomplete' => 'off',
        'role' => 'form'
    ]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Nombre', ['class' => 'form-label required']) !!}
        {!! Form::text('name', '', ['class' => 'form-control text-capitalize'.
        ($errors->has('name') ? ' is-invalid' : null)]) !!}
        @error('name')
        <span class="text-danger m-b-none">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('email', __('Email Address'), ['class' => 'form-label required'])
         !!}
        {!! Form::email('email', '', ['id' => 'email', 'class' => 'form-control
        text-lowercase'.($errors->has('email') ? ' is-invalid' : null)]) !!}
        @error('email')
        <span class="text-danger m-b-none">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('password',__('Password'), ['class' => 'form-label required']) !!}
        {!! Form::password('password', ['class' => 'form-control'.($errors->has
        ('password' ? ' is-invalid' : null))])
         !!}
        @error('password')
        <span class="text-danger m-b-none">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('password-confirm', __('Confirm Password'), ['class' =>
        'form-label']) !!}
        {!! Form::password('password_confirmation', ['id' => 'password-confirm', 'class' => 'form-control']) !!}
    </div>
    <button type="submit"
            class="btn btn-primary block full-width m-b">
        {{ __('Register') }}
    </button>
    <p class="text-muted text-center">¿Ya tiene una cuenta?</p>
    <a class="btn btn-sm btn-white btn-block"
       href="{{ route('login') }}">
        {{__('Login')}}
    </a>
    {!! Form::close() !!}
@endsection