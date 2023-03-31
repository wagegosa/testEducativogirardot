@extends('layouts.profile-user')

@section('title')
    Usuarios
@endsection

@section('page-head')
    <i class="fa fa-id-card-o"></i> Perfil.
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a>Sistema</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Usuarios</strong>
    </li>
@endsection

@section('profile-content')
    <h4><strong>{{ $usuario->name }}</strong></h4>
    <p><i class="fa fa-envelope-o"></i> {{ $usuario->email }}</p>
    <h5>
        Roles
    </h5>
    <p>
        @foreach($usuario->getRoleNames() as $role)
            <div class="text-uppercase">
                <label class="badge badge-info">{{ $role }}</label>
            </div>
        @endforeach
    </p>
@endsection

@section('permissions-user')
    <div class="row">
    @forelse($pemissionsRoleUser as $item)
        <div class="col-sm-4 b-r">{{ $item->name }}</div>
    @empty
        <label class="badge badge-danger">¡Sin asignar!</label>
    @endforelse
    </div>
@endsection