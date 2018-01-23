<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jumbotron.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @stack('stylesheets')
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</head>

<body>
    <div id="app">
    @include('layouts.navbar')

        <div class="container-fluid">
            <div class="row">
                <br><br>

                @yield('content')

            </div>
            <hr>
            <footer>
                <p>&copy; 2016 Company, Inc.</p>
            </footer>
        </div>
    </div>

@include('layouts.offer-popup')
@stack('scripts')

</body>
</html>

