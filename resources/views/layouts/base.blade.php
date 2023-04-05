<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <style>
        .fa-6{
            font-size:18em
        }
        .form-label {
            font-width: bold;
        }
        /*https://stackoverflow.com/questions/11197671/use-css-to-automatically-add-required-field-asterisk-to-form-inputs*/
        .form-label.required:after {
            color: #d00;
            /*content: " *";*/
            font-family: 'FontAwesome';
            font-weight: normal;
            font-size: 10px;
            content: " \f069";
        }
    </style>
    @stack('stylesheet')
    @livewireStyles
</head>

<body class="fixed-sidebar pace-done fixed-nav fixed-nav-basic">

    <div id="wrapper">
        <!-- Barra de menú lateral -->
        @include('layouts.navbar')

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom white-bg page-heading">
                <!-- Barra de navegacion -->
                @include('layouts.navbar-top')
                <div class="col-lg-8">
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
                <div class="col-lg-4">
                    <div class="title-action">
                        @yield('button')
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="d-flex justify-content-between">
                                    <h5>
                                        @yield('ibox-title') <small>@yield('small-title')</small>
                                    </h5>

                                </div>
                            </div>
                            <div class="ibox-content">
                                @yield('ibox-content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie de página -->
            @include('layouts.footer')
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('js/es.js') }}"></script>
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
    <!-- iCheck -->
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
                    toastr.warning('{{ $message }}');
                @endforeach
            @endif

            @if(Session::has('toastr-success'))
                @foreach(Session::pull('toastr-success') as $message)
                    toastr.success('{{ $message }}');
                @endforeach
            @endif

            @if(Session::has('toastr-error'))
                @foreach(Session::pull('toastr-error') as $message)
                    toastr.error('{{ $message }}');
                @endforeach
            @endif
        });
    </script>
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
