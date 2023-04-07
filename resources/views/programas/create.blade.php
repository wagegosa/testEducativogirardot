@extends('layouts.base')

@section('title', 'Programas')

@section('page-head')
    <i class="fa fa-graduation-cap"></i> Programas de Pregrado.
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">
        <strong>Programas</strong>
    </li>
@endsection

@section('ibox-title', 'Formulario de registro de Programas de Pregrado')
@section('small-title', 'Registre los siguientes campos.')

@section('button')
    <div class="pull-right">
        <button type="button"
                class="btn btn-md btn-default"
                onclick="window.location.href='{{
        route('pregrado.index') }}'">
            <i class="fa fa-arrow-circle-left mr-2"></i>Volver
        </button>
    </div>
@endsection

@section('ibox-content')
    {!! Form::open(['route' => ['pregrado.store'], 'autocomplete'=>'off']) !!}
    @include('programas._form', ['btnIco'=>'<i class="fa fa-save fa-lg mr-2"></i>',
    'btnText'=>'Guardar registro'])
    {!! Form::close() !!}
@endsection