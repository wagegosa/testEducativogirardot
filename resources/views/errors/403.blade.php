
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }} | 403 Error</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">


<div class="middle-box text-center animated fadeInDown">
    <h1>403</h1>
    <h3 class="font-bold">Sin autorización</h3>

    <div class="error-desc">
        Acción no autorizada.<br> ¡El acceso a este recurso del servidor está denegado!
    </div>
    <p>
        <button class="btn btn-primary"
                onclick="history.back()">
            <i class="fa fa-home"></i> Volver
        </button>
    </p>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>

</body>

</html>