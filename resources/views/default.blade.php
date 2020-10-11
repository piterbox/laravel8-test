<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Laravel 8 Test</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ url()->current() == route('index') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('index') }}">{{ trans('common.home') }}</a>
                </li>
                <li class="nav-item {{ url()->current() == route('groups.index') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('groups.index') }}">{{ trans('common.groups') }}</a>
                </li>
                <li class="nav-item {{ url()->current() == route('students.index') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('students.index') }}">{{ trans('common.students') }}</a>
                </li>
            </ul>
        </div>
    </nav>
    <section class="main">
        <div class="alerts">
            @include('alerts')
        </div>

        @yield('content')
    </section>
</div>

</body>
</html>
<body>

</body>
</html>
