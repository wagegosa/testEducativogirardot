@extends("layouts.base")

@section('title')
    Usuarios
@endsection

@section('page-head')
    <i class="fa fa-users"></i> Registro de Usuarios.
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
    Formulario de registro de datos de usuarios
@endsection

@section('small-title')
    Registre los siguientes campos.
@endsection

@section('button')
    <div class="pull-right">
        <button type="button" class="btn btn-md btn-default" onclick="window.location.href='{{
        route('usuarios.index') }}'">
            <i class="fa fa-arrow-circle-left"></i> Volver
        </button>
    </div>
@endsection

@section('ibox-content')
    {!! Form::open(['route' => ['usuarios.store'], 'autocomplete'=>'off']) !!}
        @include('sistema.usuarios._form', ['btnIco'=>'<i class="fa fa-save fa-lg"></i>','btnText'=>'Guardar registro'])
    {!! Form::close() !!}
@endsection