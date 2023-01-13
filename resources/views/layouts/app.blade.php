<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebars.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard/dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <link rel="icon" href="{{ asset('img/logo_ihc.png') }}" type="png">
    <title>{{ $title ?? '' }} - Telemedicine</title>
</head>

<body>
    <div class="d-flex flex-column mb-3">
        <div>
            @include('partials.navbartop')
        </div>
        <div class="container-fluid">
            <div class="row">
                @include('partials.navbarside')
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="pt-3 pb-2 mb-3 border-bottom w-100">
                        <div class="card">
                            @yield('container')
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sidebars.js') }}"></script>
    <script src="{{ asset('css/dashboard/dashboard.js') }}"></script>
</body>

</html>