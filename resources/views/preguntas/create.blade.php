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

@section('ibox-title', 'Formulario de registro de preguntas')
@section('small-title', 'Registre los siguientes campos.')

@section('button')
    <div class="pull-right">
        <button type="button"
                class="btn btn-md btn-default"
                onclick="window.location.href='{{
        route('preguntas.index') }}'">
            <i class="fa fa-arrow-circle-left mr-2"></i>Volver
        </button>
    </div>
@endsection

@section('ibox-content')
    {!! Form::open(['route' => ['preguntas.store'], 'autocomplete'=>'off']) !!}
    @include('preguntas._form', ['btnIco'=>'<i class="fa fa-save fa-lg mr-2"></i>',
    'btnText'=>'Guardar registro'])
    {!! Form::close() !!}
@endsection

@push('scripts')
    <!-- SUMMERNOTE -->
    <script src="{{ asset('js/plugins/summernote/summernote-bs4.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.summernote').summernote({
                focus: true,
                height: 120,
            });
        });
    </script>
    <script>
        var contador = 0;
        $('tfoot').on('click', '.addRow', function(e) {
            e.preventDefault();
            var tr = "<tr>" +
                "<td width='12%' class='align-middle'>" +
                "<input type='hidden' name='item[]' value='"+contador+"'>" +
                "<input type='radio' name='is_correct[]' value='"+contador+"' " +
                "id='is_correct_"+contador+"'>" +
                "</td>" +
                "<td width='83%'>" +
                "<input class='form-control' name='description[]' type='text' value=''>" +
                @error('description')
                "<span class='text-danger m-b-none'>{{ $message }}</span>" +
                @enderror
                "</td>" +
                "<td width='5%'>" +
                "<a href='javascript:void(0)' " +
                "class='btn btn-md btn-danger deleteRow'>" +
                "<i class='fa fa-trash-o'></i></a>" +
                "</td>" +
                "</tr>";
            $('tbody').append(tr);
            contador++;
        });

        $('tbody').on('click', '.deleteRow', function(){
            $(this).parent().parent().remove();
            contador--;
        });
    </script>

@endpush