@extends('layouts.base')

@section('title')
    Roles
@endsection

@section('page-head')
    <i class="fa fa-id-badge"></i> Edición de Roles.
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a>Sistema</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Roles</strong>
    </li>
@endsection

@section('ibox-title')
    Formulario de edición de datos de roles
@endsection

@section('small-title')
    Registre los siguientes campos.
@endsection

@section('button')
    <button type="button"
            class="btn btn-md btn-default"
            onclick="window.location.href='{{ route('roles.index') }}'">
        <i class="fa fa-arrow-circle-left"></i> Volver
    </button>
@endsection

@section('ibox-content')
    {!! Form::model($role,['route' => ['roles.update', $role->id], 'method' => 'PATCH',
    'autocomplete'=>'off']) !!}
    @include('sistema.roles._form', ['btnIco'=>'<i class="fa fa-edit fa-lg"></i>',
'btnText'=>'Editar registro'])
    {!! Form::close() !!}
@endsection
