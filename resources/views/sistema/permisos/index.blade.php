@extends('layouts.base')

@section('title')
    Permisos
@endsection

@section('page-head')
    <i class="fa fa-users"></i> Permisos del sistema.
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
    Permisos.
@endsection

@section('small-title')
    Utilice la siguiente tabla para filtrar y paginar.
@endsection

@section('button')
    <button type="button" class="btn btn-md btn-default" onclick="window.location.href='{{
    route('permisos.create') }}'">
        <i class="fa fa-plus-square"></i> Agregar nuevo permiso
    </button>
@endsection

@section('ibox-content')
    <div class="mb-3">
        <div class="page header">
            <h3>
                Busqueda de Permisos
                {!! Form::open([
                    'route' => 'permisos.index',
                    'method' => 'GET',
                    'autocomplete' => 'off',
                    'class' => 'form-inline pull-right mb-3'
                ]) !!}
                    <div class="input-group">
                        {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' =>
                        'Permiso']) !!}
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
            <th>Permiso</th>
            <th>Última actualización</th>
            <th>Acciones</th>
        </thead>
        <tbody>
        @forelse($permissions as $permission)
            <tr>
                <td class="align-middle">
                    {!! ($permissions->currentpage() - 1) * $permissions->perpage() + $loop->index
                     + 1 !!}
                </td>
                <td class="align-middle">{{ $permission->name }}</td>
                    <td class="align-middle">{{ $permission->updated_at }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button"
                                class="btn btm-md btn-primary"
                                onclick="window.location.href='{{ route('permisos.edit', $permission->id)
                                }}'">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button"
                                class="btn btm-md btn-danger">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
        @empty
            <tr>
                <td colspan="4">
                    <div class="alert alert-info">
                        <div class="text-center">¡No se encontraron resultados!</div>
                    </div>
                </td>
            </tr>
        @endforelse
    </table>
    <div class="d-flex justify-content-end">
        {{ $permissions->links() }}
    </div>
@endsection