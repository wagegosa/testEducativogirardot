@extends('layouts.base')

@section('title', 'Preguntas')

@section('page-head')
    <i class="fa fa-question-circle"></i> Preguntas.
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a>Módulos</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Preguntas</strong>
    </li>
@endsection

@section('ibox-title', 'Preguntas')
@section('small-title', 'Utilice la siguiente tabla para filtrar y paginar.')

@section('button')
    <button type="button"
            class="btn btn-md btn-default"
            onclick="window.location.href='{{ route('preguntas.create') }}'">
        <i class="fa fa-plus-square mr-2"></i>Agregar nueva pregunta
    </button>
@endsection

@section('ibox-content')
    <table class="table table-bordered">
        <thead>
        <th width="5%">#</th>
        <th>Pregunta</th>
        <th>Acciones</th>
        </thead>
        <tbody>
        @forelse($questions as $item)
            <tr>
                <td class="align-middle">
                    <div class="text-right">
                    {!! ($questions->currentpage() - 1) * $questions->perpage() + $loop->index +
                    1 !!}
                    </div>
                </td>
                <td class="align-middle">{!! $item->title !!} </td>
                <td>
                    <div class="btn-group">
                        <button type="button"
                                class="btn btm-md btn-primary"
                                onclick="window.location.href='{{ route('preguntas.edit', $item->id)
                                }}'">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button"
                                class="btn btn-md btn-info"
                                onclick="window.location.href='{{ route('preguntas.show',
                                $item->id)
                                }}'">
                            <i class="fa fa-eye"></i>
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
        {{ $questions->links() }}
    </div>
@endsection