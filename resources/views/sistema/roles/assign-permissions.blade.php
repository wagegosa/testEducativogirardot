@extends('layouts.base')

@section('title')
    Roles
@endsection

@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/plugins/dualListbox/bootstrap-duallistbox.min.css') }}">
@endpush

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
    Formulario de asignación de permisos a roles
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
    {!! Form::model($role,['route' => ['roles.updatePermissions', $role->id], 'method' => 'PATCH',
    'autocomplete'=>'off']) !!}
    @include('sistema.roles._form-assign-permissions', ['btnIco'=>'<i class="fa fa-edit fa-lg"></i>',
'btnText'=>'Asignar permisos'])
    {!! Form::close() !!}
@endsection

@push('scripts')
    <!-- Dual Listbox -->
    <script src="{{ asset('js/plugins/dualListbox/jquery.bootstrap-duallistbox.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dual_select').bootstrapDualListbox({
                selectorMinimalHeight: 160,
                filterTextClear: 'Ver todo'
                ,filterPlaceHolder: 'Filtrar'
                ,moveSelectedLabel:'Mover seleccionado'
                ,moveAllLabel: 'Mover todo'
                ,removeSelectedLabel: 'Eliminar selección'
                ,removeAllLabel: 'Eliminar todo'
                ,moveOnSelect: false
                ,preserveSelectionOnMove: 'Movido'
                ,selectedListLabel: 'Seleccionado'
                ,showFilterInputs: true
                ,infoText: 'Mostrando todo {0}'
                ,infoTextFiltered: '<span class="label label-warning">Filtrado</span> {0} de {1}'
                ,infoTextEmpty: 'Lista vací­a'
                ,nonSelectedListLabel: 'No seleccionado'
            });
        });
    </script>
@endpush