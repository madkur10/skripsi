<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>{{ $title }} - Telemedicine</title>
</head>

<body>
    <div class="d-flex flex-row">
        <div class="bd-highlight">
            @include('partials.navbarside')
        </div>
        <div class="bd-highlight">
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <br>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                @yield('container')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>