@extends('layouts.pdf')
<div class="container">


<div class="row">
    <div class="col-md-6">
        <div class="profile-image">
            <img src="{{ $student->picture_gender }}" style="width: 100px; height: 100px;"
                 class="img-thumbnail" alt="profile">
        </div>
        <div class="">
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
</table>

</div>