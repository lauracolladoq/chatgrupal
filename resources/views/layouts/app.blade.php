<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <link rel="stylesheet" type="text/css" href="resources/css/app.css">

</head>

<body>
    <x-banner />

    <nav>
        <div class="container nav-container">
            <div class="logo">
                <h3>Life <span>Core</span></h3>
            </div>
            <div class="search-bar">
                <i class="fa fa-search"></i>
                <input type="search" placeholder="Serch For Creators" />
            </div>
            <div class="add-post">
                <label for="add-post" class="btn btn-primary">Add Post</label>
                <div class="profile-picture" id="my-profile-picture">
                    <img src="" alt="" />
                </div>
            </div>
        </div>
    </nav>
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    @stack('modals')

    @livewireScripts
</body>

</html>
