@extends('layouts.base')

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
    Información del Usuario.
@endsection

@section('small-title')
    En la tabla podrá ver toda la información referente del usuario.
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
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th width="15%"><h4><i class="fa fa-user"></i> Usuario</h4></th>
                <td class="align-middle">{{ $usuario->name }}</td>
                <th width="25%"><h4><i class="fa fa-envelope-o"></i> Correo electrónico</h4></th>
                <td class="align-middle">{{ $usuario->email }}</td>
            </tr>
            <tr>
                <th><h4><i class="fa fa-id-badge"></i> Rol</h4></th>
                <td class="align-middle">
                    @foreach($usuario->getRoleNames() as $role)
                        <div class="text-uppercase">
                            <label class="badge badge-info">{{ $role }}</label>
                        </div>
                    @endforeach
                </td>
                <th><h4><i class="fa fa-clock-o"></i> Última actualización</h4></th>
                <td class="align-middle">
                    {{--                isoFormat('ddd D [de] MMMM, YYYY - h:i:s--}}
                    {{ $usuario->updated_at->locale('es')->isoFormat('ddd D [de] MMMM, YYYY - h:m:s A
                    ') }}
                </td>
            </tr>
            @hasanyrole('Super-Admin|Administrador')
            <tr>
                <th><h4><i class="fa fa-lock"></i> Acceso</h4></th>
                <td class="align-middle" colspan="3">
                    <div class="row">
                        @forelse($pemissionsRoleUser as $item)
                            <div class="col-sm-3 b-r">{{ $item->name }}</div>
                        @empty
                            <label class="badge badge-danger">¡Sin asignar!</label>
                        @endforelse
                    </div>
                </td>
            </tr>
            @endhasanyrole
        </table>
    </div>
@endsection

