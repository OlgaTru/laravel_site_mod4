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
    <link href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
    @stack('stylesheets')

</head>
<body>

<div id="admin">

@include('admin.admin-navbar')


            @yield('content')

        <hr>
        <footer>
            <p>&copy; 2016 Company, Inc.</p>
        </footer>

</div>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@stack('scripts')


</body>
</html>
















{{--@include('layouts.navbar')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

               --}}{{-- <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>--}}{{--
            </div>
        </div>
    </div>
</div>
@endsection--}}
