<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title')</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    @stack('stylesheet')
    @livewireStyles
</head>

<body class="fixed-sidebar pace-done fixed-nav fixed-nav-basic md-skin">

<div id="wrapper">

    @include('layouts.navbar')

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg page-heading">
            @include('layouts.navbar-top')
            <div class="col-lg-10">
                <h2>@yield('page-head')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Inicio</a>
                    </li>
                    @yield('breadcrumb')
                    {{-- <li class="breadcrumb-item">
                        <a>Forms</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Basic Form</strong>
                    </li> --}}
                </ol>
            </div>
        </div>
        <!-- Detalles del perfil -->
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Detalles del perfil</h5>
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <img alt="image"
                                     class="img-fluid"
                                     src="{{ asset('img/profile_big.jpg') }}">
                            </div>
                            <div class="ibox-content profile-content">
                                @yield('profile-content')
                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button"
                                                    class="btn btn-primary btn-sm btn-block"
                                                    onclick="window.location.href='{{ route
                                                    ('usuarios.edit', $usuario->id)
                                                    }}'">
                                                <i class="fa fa-edit"></i>
                                                Editar perfil
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button"
                                                    class="btn btn-default btn-sm btn-block"
                                                    onclick="window.location.href='{{ route
                                                    ('usuarios.index')
                                                    }}'">
                                                <i class="fa fa-arrow-circle-left"></i> Volver
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Permisos de acceso</h5>
                        </div>
                        <div class="ibox-content">
                            <div>
                                @yield('permissions-user')
                            </div>
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
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/plugins/momentjs/moment-with-locales.js') }}"></script>
<script src="{{ asset('js/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}"></script>
<!-- Custom and plugin javascript -->
<script src="{{ asset('js/inspinia.js') }}"></script>
<script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>
<!-- Notificaciones en pantalla - toastr -->
<script>
    window.addEventListener('load', function() {
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "2500",
        };

        @if(Session::has('toastr-info'))
        @foreach(Session::pull('toastr-info') as $message)
        toastr.info('{{ $message }}');
        @endforeach
        @endif

        @if(Session::has('toastr-warning'))
        @foreach(Session::pull('toastr-warning') as $message)
        toastr.info('{{ $message }}');
        @endforeach
        @endif

        @if(Session::has('toastr-success'))
        @foreach(Session::pull('toastr-success') as $message)
        toastr.info('{{ $message }}');
        @endforeach
        @endif

        @if(Session::has('toastr-error'))
        @foreach(Session::pull('toastr-error') as $message)
        toastr.info('{{ $message }}');
        @endforeach
        @endif
    });
</script>
<!-- iCheck -->
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
<!--  momentjs -->
<script>
    moment.locale('es-mx');
    window.setInterval(function () {
        $('.time').html(moment().format('dddd, D \\d\\e MMMM \\d\\e YYYY, h:mm:ss a'))
    }, 1000);
</script>
@stack('scripts')
@livewireScripts
</body>

</html>
