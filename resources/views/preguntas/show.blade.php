@extends('layouts.base')

@section('title', 'Preguntas')

@section('page-head')
    <i class="fa fa-question-circle"></i> Preguntas.
@endsection

@section('ibox-title', 'Detalle de la pregunta')
@section('small-title')
    <span class="label label-primary">ID No. {{ $pregunta->id }}</span>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a>Módulos</a>
    </li>
    <li class="breadcrumb-item active">
        <strong>Preguntas</strong>
    </li>
@endsection

@section('button')
    <button type="button"
            class="btn btn-md btn-default"
            onclick="window.location.href='{{ route('preguntas.index') }}'">
        <i class="fa fa-arrow-circle-left mr-2"></i>Volver
    </button>
@endsection

@section('ibox-content')
    <div class="form-group">
        <h3>{!! $pregunta->title !!}</h3>
    </div>
    <ul>
        @foreach($answers as $answer)
            <li>
                <h4>
                    {!! $answer->description.' &mdash; ' !!}  {!! ($answer->is_correct) ? 'Correcto' :
                'Incorrecto' !!}
                </h4>
            </li>
        @endforeach
    </ul>
    <div class="row justify-content-md-between mr-1">
        <button class="btn btn-md btn-default"
                type="button"
                onclick="window.location.href='{{ route('preguntas.index') }}'">
            <i class="fa fa-arrow-circle-left mr-2"></i>Volver
        </button>
        <button class="btn btn-md btn-primary mr-2"
                type="button"
                onclick="window.location.href='{{ route('preguntas.edit', $pregunta->id) }}'">
            <i class="fa fa-edit mr-2"></i>Actualizar
        </button>
    </div>
@endsection