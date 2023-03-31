<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | {{ __('Register') }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
    <div class="middle-box text-center loginscreen   animated fadeInDown">
      <div>
{{--        <div>--}}
{{--          <h1 class="logo-name"><i class="fa fa-drivers-license-o"></i></h1>--}}
{{--        </div>--}}
          <h3>{{ __('Register') }} en {{ config('app.name') }}</h3>
          @yield('form-login')
      </div>
    </div>
</body>
<!-- Mainly scripts -->
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
</html>