<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

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
<div class="passwordBox animated fadeInDown">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <h2 class="font-bold">@yield('ibox-content')</h2>
                @yield('message')
                <div class="row">
                    <div class="col-lg-12">
                        @yield('form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            Copyright {{ config('app.name') }}
        </div>
        <div class="col-md-6 text-right">
            <small>© @php echo date('Y') @endphp</small>
        </div>
    </div>
</div>
</body>
</html>