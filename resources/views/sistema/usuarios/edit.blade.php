@extends('layouts.base')

@section('title')
    Usuarios
@endsection

@section('page-head')
    <i class="fa fa-users"></i> Edición de Usuarios.
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a>Sistema</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Usuarios</strong>
    </li>
@endsection

@section('ibox-title')
    Formulario de edición de datos de usuarios
@endsection

@section('small-title')
    Registre los siguientes campos.
@endsection

@section('button')
    <div class="pull-right">
        <button type="button"
                class="btn btn-md btn-default"
                onclick="window.location.href='{{ route('usuarios.index') }}'">
            <i class="fa fa-arrow-circle-left"></i> Volver
        </button>
    </div>
@endsection

@section('ibox-content')
    {!! Form::model($usuario,['route' => ['usuarios.update', $usuario->id], 'method' => 'PATCH',
    'autocomplete'=>'off']) !!}
        @include('sistema.usuarios._form-edit', ['btnIco'=>'<i class="fa fa-edit fa-lg"></i>',
    'btnText'=>'Editar registro'])
    {!! Form::close() !!}
@endsection
