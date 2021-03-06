<!DOCTYPE html>
<html lang="{{ JetAdminLte::lang() }}" class="{{ JetAdminLte::mode() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} @if(JetAdminLte::title()) | {{ JetAdminLte::title() }}@endif</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
</head>
<body class="hold-transition {{ $page ?? 'login-page' }}">

{{ $slot }}

@stack('modals')

@livewireScripts

<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
