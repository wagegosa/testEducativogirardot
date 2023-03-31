@extends('layouts.base')

@section('title')
    Usuarios
@endsection

@section('page-head')
    <i class="fa fa-key"></i> Registro de Permisos.
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a>Sistema</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Permisos</strong>
    </li>
@endsection

@section('ibox-title')
    Formulario de registro de permisos
@endsection

@section('small-title')
    Registre los siguientes campos.
@endsection

@section('button')
    <button type="button" class="btn btn-md btn-default" onclick="window.location.href='{{
    route('permisos.index') }}'">
        <i class="fa fa-arrow-circle-left"></i> Volver
    </button>
@endsection

@section('ibox-content')
    {!! Form::open(['route' => ['permisos.store'], 'autocomplete'=>'off']) !!}
    @include('sistema.permisos._form', ['btnIco'=>'<i class="fa fa-save fa-lg"></i>','btnText'=>'Guardar registro'])
    {!! Form::close() !!}
@endsection