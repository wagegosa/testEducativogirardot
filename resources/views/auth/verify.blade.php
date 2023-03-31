@extends('layouts.verify')

@section('title', __('Verify Your Email Address'))

@section('ibox-content',  __('Verify Your Email Address'))

@section('message', __('A fresh verification link has been sent to your email address.'))

@section('body')
    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }},
@endsection

@section('form')
    {!! Form::open([
        'class' => 'd-inline',
        'route' => 'verification.resend',
        'autocomplete' => 'off',
        'method' => 'post'
    ]) !!}
    <button type="submit"
            class="btn btn-link p-0 m-0 align-baseline">
        {{ __('click here to request another') }}
    </button>.
    {!! Form::close() !!}
@endsection
