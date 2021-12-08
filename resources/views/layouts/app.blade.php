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

<x-jet-adminlte::body>

    <div class="wrapper">
        <x-jet-adminlte::navbar/>

        <x-jet-adminlte::sidebar/>

        <div class="content-wrapper">
            <x-jet-adminlte::content-header title="{{ $title ?? JetAdminLte::title() }}"/>

            <section class="content">
                <div class="container-fluid">
                    <x-jet-adminlte::widget.success-message/>
                    <x-jet-adminlte::widget.failure-message/>

                    {{ $slot }}
                </div>
            </section>
        </div>

        <x-jet-adminlte::footer/>

        <x-jet-adminlte::sidebar-left/>
    </div>

    @stack('modals')

    @livewireScripts

    <script src="{{ mix('js/app.js') }}" defer></script>

</x-jet-adminlte::body>
</html>
