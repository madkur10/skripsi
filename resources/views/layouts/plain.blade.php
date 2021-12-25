<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <title>{{ $title ?? '' }} - Telemedicine</title>
</head>

<body>
    <div class="container mt-4">
        @yield('container')
    </div>
    <script src="js/script.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>