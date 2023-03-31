<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="top-navigation pace-done">

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
            <nav class="navbar navbar-expand-lg navbar-static-top" role="navigation">
                <a href="#" class="navbar-brand">OES</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-reorder"></i>
                </button>
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="active">
                            <a aria-expanded="false" role="button" href="#">
                                Bienvenido a {{ config('app.name') }}
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nac navbar-top-links navbar-right">
                        <li>
                            @if(Route::has('login'))
                                <a href="{{ route('login') }}">
                                    <i class="fa fa-sign-in"></i>
                                    {{__('Login')}}
                                </a>
                            @endif
                        </li>
                        <li>
                            @if(Route::has('register'))
                                <a href="{{ route('register') }}">
                                    <i class="fa fa-user-plus"></i>
                                    {{__('Register')}}
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight article">
            <div class="row justify-content-md-center">
                <div class="col-lg-10">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="text-center article-title">
                                <h1>
                                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                                    Online Examination System
                                </h1>
                            </div>
                            <p>
                                Este Sistema de Preguntas & Respuestas en Línea, permite
                                gestionar sencillamente cuestionarios, registrar usuarios,
                                roles, permisos, preguntas y respuestas.
                            </p>
                            <p>
                                La aplicación tiene los perfiles de Adminsitrador, Docente y
                                Estudiante que es quien contesta los cuestionarios. Este usuario
                                Estudiante tiene la facultad de contesta todas las preguntas
                                generadas una sola vez, después que el estado de la pregunta a
                                finalizado, se registra en el sistema y no se puede modificar.
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        @include('layouts.footer')

    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('') }}js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{{ asset('') }}js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('js/inspinia.js') }}"></script>
<script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>

</body>
</html>