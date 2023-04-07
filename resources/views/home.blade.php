@extends('layouts.base')

@section('title', 'Inicio')

@section('page-head')
<i class="fa fa-home"></i> Inicio
@endsection

@section('ibox-title')
Dashboard {!! $role !!}
@endsection

@section('ibox-content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-users"></i> Listado de Estudiantes
        </div>
        <div class="panel-body">
            <div class="d-flex justify-content-end mb-3">
                <form action="{{ route('export_students') }}" enctype="multipart/form-data">
                    <button class="btn btn-md btn-success mr-4">
                        <i class="fa fa-file-excel-o"></i> Exportar listado
                    </button>
                </form>

                <form action="{{ route('export_questionnaires') }}" enctype="multipart/form-data">
                    <button class="btn btn-md btn-success">
                        <i class="fa fa-file-excel-o"></i> Exportar cuestionario
                    </button>
                </form>
            </div>
            <table class="table table-bordered">
                <thead>
                    <td>No.</td>
                    <td>Nombre</td>
                    <td>Email</td>
                    <td>Género</td>
                    <td>Fecha de nacimiento</td>
                    <td>Edad</td>
                    <td>Carrera</td>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="align-middle">
                                {!! ($users->currentpage() - 1) * $users->perpage() +
                                $loop->index
                                 + 1 !!}
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->format_date }}</td>
                            <td>{{ $user->age }}</td>
                            <td>{{ $user->career->career }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    @if($role == 'Estudiante')
<div class="row m-b-lg m-t-lg">
    <div class="col-md-6">
        <div class="profile-image">
            <img src="{{ $student->picture_gender }}" class="rounded-circle circle-border m-b-md" alt="profile">
        </div>
        <div class="profile-info">
            <div class="">
                <div>
                    <h2 class="no-margins">
                        {{ $student->name }}
                    </h2>
                    <h4>{{ $student->email }}</h4>
                    <h5>No. Documento: {!! $student->identity_number !!}</h5>
                    <small>
                        Género: {!! $student->gender !!} <br>
                        Fecha de nacimiento: {!! $student->format_date !!} - Edad: {!! $student->age !!} años
                    </small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <table class="table small m-b-xs">
            <tbody>
                @foreach($questionnaire as $data)
                <tr>
                    <td>
                        <strong>{{ $data->total }}</strong> {{ $data->learning_style }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <small>Carrera / Programa de Pregrado</small>
        <h4 class="no-margins">{!! $student->career->career !!}</h4>
        <a href="{{ route('descargar-pdf') }}" target="_blank" class="btn btn-md btn-primary mt-4"><i
                class="fa
        fa-file-pdf-o"
                                                           aria-hidden="true"></i> Exportar a PDF</a>
    </div>
</div>
<div class="hr-line-dashed"></div>
<table class="table table-bordered">
    <thead>
        <th>No.</th>
        <th>Pregunta</th>
        <th>Respuesta</th>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach($answers as $data)
        <tr>
             <td class="align-middle">
                    <div class="text-right">
                        {!! str_pad($i++,2,'0',STR_PAD_LEFT) !!}
                    </div>
            </td>
            <td>{{ $data->title }}</td>
            <td>{{ $data->description }}</td>
        </tr>
        @endforeach
    </tbody>
    @endif
@endsection
