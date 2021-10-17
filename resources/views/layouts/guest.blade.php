<!DOCTYPE html>
<html lang="{{ JetAdminLte::lang() }}" class="{{ JetAdminLte::mode() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} @isset($title)| {{ $title }}@endisset</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="hold-transition login-page">
<div class="wrapper">
    {{ $slot }}
</div>

@stack('modals')

@livewireScripts
</body>
</html>
