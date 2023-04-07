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
        {!! Form::label('date_birth', 'Fecha de Nacimiento', ['class' => 'form-label required']) !!}
        {!! Form::date('date_birth', \Illuminate\Support\Carbon::now(), ['id' => 'date_birth', 'class' => 'form-control']) !!}
        @error('date_birth')
        <span class="text-danger m-b-none">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('identity_number', 'Número de Identificación', ['class' => 'form-label
        required']) !!}
        {!! Form::text('identity_number', '', ['class' => 'form-control text-capitalize'.
        ($errors->has('identity_number') ? ' is-invalid' : null)]) !!}
        @error('identity_number')
        <span class="text-danger m-b-none">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('gender', 'Género', ['class' => 'form-label required']) !!}
        <div class="i-checks">
            <label>
                {!! Form::radio('gender', 'male', null, []) !!} <i></i>Masculino
            </label>
            <label>
                {!! Form::radio('gender', 'female', null, []) !!} <i></i>Femenino
            </label>
        </div>
        @error('gender')
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
        {!! Form::label('career', 'Carrera / Programa de Pregrado', ['class' => 'form-label
        required']) !!}
        {!! Form::select('career', $careers, null, ['id' => 'career', 'class' =>
        'select2 form-control',
        'placeholder' => 'Seleccione...', 'lang' => 'es']) !!}
        @error('career')
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