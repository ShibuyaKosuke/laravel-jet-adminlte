<!DOCTYPE html>
<html lang="{{ JetAdminLte::lang() }}" class="{{ JetAdminLte::mode() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} @if($title ?? JetAdminLte::title())| {{ $title ?? JetAdminLte::title() }}@endif</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
</head>
<body class="hold-transition layout-top-nav layout-footer-fixed">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="" class="navbar-brand">
                <x-jet-adminlte::widget.logo-image/>

                <span class="brand-text font-weight-light">Laravel-Jet-AdminLTE 3</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @if (Route::has('login'))
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Log in') }}</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            @endif
        </div>
    </nav>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    @isset($title)
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}</h1>
                        </div>
                    @endisset
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

@livewireScripts

<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
