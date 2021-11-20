<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    </head>

<body>

    <x-menus.navigation></x-menus.navigation>

    <x-menus.sub-menu-bar>
        @if(isset($menuBarLeft))
            <x-slot name="menuBarLeft">
                {{ $menuBarLeft }}
            </x-slot>
        @endif()

        @if (isset($menuBarRight))
            <x-slot name="menuBarRight">
                {{ $menuBarRight }}
            </x-slot>
        @endif()
    </x-menus.sub-menu-bar>

    <div class="container">
        <div class="columns" style="display: block">
            {{ $slot }}
        </div>
    </div>

    @livewireStyles
    @livewireScripts

    <script async type="text/javascript" src="/js/app.js"></script>
</body>

</html>
