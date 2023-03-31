@extends('layouts.base')

@section('title')
    Roles
@endsection

@section('page-head')
    <i class="fa fa-id-badge"></i> Roles del sistema.
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
    Roles.
@endsection

@section('small-title')
    Utilice la siguiente tabla para filtrar y paginar.
@endsection

@section('button')
    <button type="button"
            class="btn btn-md btn-default"
            onclick="window.location.href='{{ route('roles.create') }}'">
        <i class="fa fa-plus-square"></i> Agregar nuevo rol
    </button>
@endsection

@section('ibox-content')
    <table class="table table-bordered">
        <thead>
        <th>#</th>
        <th>Permiso</th>
        <th>Última actualización</th>
        <th>Acciones</th>
        </thead>
        <tbody>
        @forelse($roles as $role)
            <tr>
                <td class="align-middle">
                    <div class="text-center">
                        {!! ($roles->currentpage() - 1) * $roles->perpage() + $loop->index
                     + 1 !!}
                    </div>
                </td>
                <td class="align-middle">{{ $role->name }}</td>
                <td class="align-middle">{{ $role->updated_at }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button"
                                class="btn btm-md btn-primary"
                                onclick="window.location.href='{{ route('roles.edit', $role->id)
                                }}'">
                            <i class="fa fa-edit"></i>
                        </button>
                        <buton type="button"
                               class="btn btn-md btn-info"
                               onclick="window.location.href='{{ route('roles.permissions', $role->id)
                               }}'">
                            <i class="fa fa-id-card"></i>
                        </buton>
                    </div>
                </td>
            </tr>
        </tbody>
        @empty
            <tr>
                <td colspan="3">
                    <div class="alert alert-info">
                        <div class="text-center">¡No se encontraron resultados!</div>
                    </div>
                </td>
            </tr>
        @endforelse
    </table>
@endsection