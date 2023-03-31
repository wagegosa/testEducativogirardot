@extends('layouts.base')

@section('title', 'Cuestionario')

@section('page-head')
    <i class="fa fa-comments-o"></i> Cuestionario.
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">
        <strong>Cuestionario</strong>
    </li>
@endsection

@section('ibox-title', 'Cuestionario HONEY-ALONSO de ESTILOS DE APRENDIZAJE')
@section('small-title', 'Instrucciones para responder el cuestionario:')

@section('ibox-content')
    <p>
        Este cuestionario ha sido diseñado para identificar tu estilo preferido para aprender.
        <b>No</b> es un test de <b>inteligencia</b>, ni de <b>personalidad</b>.
    </p>
    <ul>
        <li>No hay límite de tiempo para contestar el cuestionario.</li>
        <li>No hay respuestas correctas o erróneas. Será útil en la medida que seas sincero/a
            en tus respuestas.</li>
        <li>Por favor contesta a todas las sentencias.</li>
    </ul>

    {!! Form::open(['route' => 'cuestionario.store', 'action' => 'post', 'autocomplete' => 'off']) !!}
        <!-- Formulario -->
        @include('cuestionario._form', ['btnIco'=>'<i class="fa fa-save fa-lg mr-2"></i>',
    'btnText'=>'Guardar registro'])
    {!! Form::close() !!}
@endsection