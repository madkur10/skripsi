<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>{{ $title }} - Telemedicine</title>
</head>

<body>

    <!-- @include('partials.navbar'); -->

    <div class="container mt-4">
        @yield('container')
    </div>
    <script src="js/script.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>