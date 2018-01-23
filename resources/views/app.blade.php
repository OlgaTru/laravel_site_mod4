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
    {{--<script type="text/javascript" src="{{asset('js/exit-popup.js')}}"></script>--}}

</head>

<body>

    <div id="app">

@include('layouts.navbar')

@yield('slider')

        <div class="container-fluid">

            <div class="row">
                  <div class="col-md-2">
                        @include('layouts.ad', ['start' => 0, 'end' => 3, 'align' => 'left'])
                  </div>

                  @yield('content')

                  <div class="col-md-2">
                        @include('layouts.ad', ['start' => 4, 'end' => 7, 'align' => 'right'])
                  </div>
            </div>

            <div class="row">

                @yield('content2')

            </div>

            <hr>
            <footer>
                <p>&copy; 2016 Company, Inc.</p>
            </footer>

        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>


    @include('layouts.offer-popup')

    @stack('scripts')


</body>
</html>
