@extends('layouts.base')

@section('title', 'Programas')

@section('page-head')
    <i class="fa fa-graduation-cap"></i> Programas de Pregrado.
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">
        <strong>Programas</strong>
    </li>
@endsection

@section('ibox-title', 'Programas de Pregrado')
@section('small-title', 'Utilice la siguiente tabla para filtrar y paginar.')

@section('button')
    <button type="button"
            class="btn btn-md btn-default"
            onclick="window.location.href='{{ route('pregrado.create') }}'">
        <i class="fa fa-plus-square mr-2"></i>Agregar nueva programa
    </button>
@endsection

@section('ibox-content')
    <table class="table table-bordered">
        <thead>
        <th width="24px">#</th>
        <th>Programa de Pregrado</th>
        <th width="10%">Acciones</th>
        </thead>
        <tbody>
        @forelse($careers as $item)
            <tr>
                <td class="align-middle">
                    <div class="text-right">
                        {!! ($careers->currentpage() - 1) * $careers->perpage() + $loop->index +
                        1 !!}
                    </div>
                </td>
                <td class="align-middle">{!! $item->career !!} </td>
                <td>
                    <div class="btn-group">
                        <button type="button"
                                class="btn btm-md btn-primary"
                                onclick="window.location.href='{{ route('pregrado.edit', $item->id)
                                }}'">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button"
                                class="btn btn-md btn-info"
                                onclick="window.location.href='{{ route('pregrado.show',
                                $item->id)
                                }}'">
                            <i class="fa fa-eye"></i>
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
        {{ $careers->links() }}
    </div>
@endsection