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
</head>
<body class="gray-bg">
    <div class="passwordBox animated fadeInDown">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox-content">
                    <h2 class="font-bold">@yield('ibox-content')</h2>
                    <div class="row">
                        <div class="col-lg-12">
                            @if (session('resent'))
                                <class class="alert alert-success">
                                    @yield('message')
                                </class>
                                <hr>
                            @endif
                            @yield('body')
                            @yield('form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            Copyright {{ config('app.name').' ver. ' .config('app.version') }}
        </div>
        <div class="col-md-6 text-right">
            <small>© @php echo date('Y'); @endphp</small>
        </div>
    </div>
</body>
</html>