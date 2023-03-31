@extends('layouts.base')

@section('title')
    Usuarios
@endsection

@section('page-head')
    <i class="fa fa-users"></i> Usuarios del sistema.
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
    Usuarios.
@endsection

@section('small-title')
    Utilice la siguiente tabla para filtrar y paginar.
@endsection

@section('button')
    <div class="pull-right">
        <button type="button" class="btn btn-md btn-default" onclick="window.location.href='{{
        route('usuarios.create') }}'">
            <i class="fa fa-plus-square"></i> Agregar nuevo usuario
        </button>
    </div>
@endsection

@section('ibox-content')
    <div class="mb-3">
        <div class="page header">
            <h3>
                Busqueda de Permisos
                {!! Form::open([
                    'route' => 'usuarios.index',
                    'method' => 'GET',
                    'autocomplete' => 'off',
                    'class' => 'form-inline pull-right mb-3'
                ]) !!}
                <div class="input-group">
                    {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' =>
                    'Nombre del usuario']) !!}
                    <span class="input-group-append">
                            <button type="submit"
                                    class="btn btn-primary">
                                <i class="fa fa-search"></i> Buscar
                            </button>
                        </span>
                </div>
                {!! Form::close() !!}
            </h3>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol/Perfil</th>
            <th>Última actualización</th>
            <th>Acciones</th>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td class="align-middle">
                    {!! ($users->currentpage() - 1) * $users->perpage() + $loop->index + 1 !!}
                </td>
                <td class="align-middle">{{ $user->name }}</td>
                <td class="align-middle">{{ $user->email }}</td>
                <td class="align-middle">
                    @foreach($user->getRoleNames() as $role)
                        <div class="p-xxs label label-success text-center text-uppercase">
                            {{ $role }}
                        </div>
                    @endforeach
                </td>
                <td class="align-middle">{{ $user->created_at->diffForHumans() }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btm-md btn-info" onclick="window
                        .location.href='{{ route('usuarios.show', $user->id) }}'">
                            <i class="fa fa-eye"></i>
                        </button>
                        <button type="button" class="btn btm-md btn-primary" onclick="window
                        .location.href='{{ route('usuarios.edit', $user->id) }}'">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button" class="btn btm-md btn-danger">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
        @empty
            <tr>
                <td colspan="6">
                    <div class="alert alert-info">
                        <div class="text-center">¡No se en contraron resultados!</div>
                    </div>
                </td>
            </tr>
        @endforelse
    </table>
    <div class="d-flex justify-content-end">
        {{ $users->links() }}
    </div>
@endsection