@extends('layouts.base')

@push('stylesheet')
    <link href="{{ asset('css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endpush

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

@section('ibox-title', 'Formulario de edición de preguntas')
@section('small-title', 'Registre los siguientes campos.')

@section('button')
    <button type="button"
            class="btn btn-md btn-default"
            onclick="window.location.href='{{ route('preguntas.index') }}'">
        <i class="fa fa-arrow-circle-left mr-2"></i> Volver
    </button>
@endsection

@section('ibox-content')
    <!-- Formulario de edición -->
    {!! Form::model($pregunta,['route' => ['preguntas.update', $pregunta->id], 'method' =>
    'PATCH',
    'autocomplete'=>'off']) !!}
        <!-- Campos del formulario -->
    @include('preguntas._form', ['btnIco'=>'<i class="fa fa-save fa-lg mr-2"></i>',
    'btnText'=>'Actualizar registro'])
    {!! Form::close() !!}
@endsection

@push('scripts')
    <!-- SUMMERNOTE -->
    <script src="{{ asset('js/plugins/summernote/summernote-bs4.js') }}"></script>
    <!-- form-repeater -->
    <script src="{{ asset('js/plugins/form-repeater/repeater.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.summernote').summernote({
                focus: true,
                height: 120,
            });
        });
    </script>
    <script>
        $('thead').on('click', '.addRow', function() {
           console.log('click');
           var description = "<input class='form-control' name='description[]' type='text' value=''>";
           var tr = "<tr>" +
                "<td width='96px' class='align-middle'>" +
                "<input id='correct' class='mr-2' name='is_correct[]' type='radio' value='1'>" +
                "<i class='fa fa-thumbs-o-up' aria-hidden='true'></i>" +
                "&nbsp;" +
                "<input id='incorrect' class='mr-2' name='is_correct[]' type='radio' value='0'>" +
                "<i class='fa fa-thumbs-o-down' aria-hidden='true'></i>" +
                "</td>" +
                "<td>" + description +
                "</td>" +
                "<td width='5px'>" +
                "<a href='javascript:void(0)' " +
                "class='btn btn-md btn-danger deleteRow'>" +
                "<i class='fa fa-trash-o'></i></a>" +
                "</td>" +
                "</tr>";
           $('tbody').append(tr);
        });

        $('tbody').on('click', '.deleteRow', function(){
             $(this).parent().parent().remove();
        });
    </script>
@endpush