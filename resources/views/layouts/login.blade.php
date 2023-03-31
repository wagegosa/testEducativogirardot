<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | Login </title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-bold">Bienvenido a {{ config('app.name') }}</h2>
                <p class="text-center p-lx">
                    <i class="fa fa-id-badge fa-6"></i>
                </p>
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    @yield('form-login')
                    <p class="m-t">
                        <small>
                            {{ config('app.name') }} framework base on Laravel ver. {{ Illuminate\Foundation\Application::VERSION }}<br>
                            (PHP ver. {{ PHP_VERSION }}. - {{ setMySQLNameVersion().' ver. '.setMySQLVersion() }})
                            <br>&copy; @php echo date('Y') @endphp</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright {{ config('app.name') }} ver. {{ config('app.version') }}
            </div>
            <div class="col-md-6 text-right">
               <small>© @php echo date('Y') @endphp</small>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>
</html>
