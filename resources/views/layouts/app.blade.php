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
        <div class="container main-container">
            <!-- ------------------------------------------- Inicio Sección Izquierda ------------------------------------------- -->
            <div class="main-left">
                <!-- -------------------- Perfil -------------------- -->
                <a href="" class="profile">
                    <div class="profile-picture" id="my-profile-picture">
                        <img src="Assets/images/img/f1.jpg" alt="" />
                    </div>
                    <div class="profile-handle">
                        <h4>Beg Joker</h4>
                        <p class="text-gry">@thebegjoker</p>
                    </div>
                </a>

                <!-- ------------------------------------------- Inicio Aside ------------------------------------------- -->
                <aside>
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')"
                        class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <span><img src="https://cdn.hugeicons.com/icons/home-01-stroke-rounded.svg" alt="home-01"
                                width="48" height="48" />
                        </span>
                        <h3>Home</h3>
                    </x-nav-link>

                    <x-nav-link href="{{ route('index') }}" :active="request()->routeIs('index')"
                        class="menu-item {{ request()->routeIs('index') ? 'active' : '' }}">
                        <span> <img src="https://cdn.hugeicons.com/icons/user-stroke-rounded.svg" alt="user"
                                width="48" height="48" />
                        </span>
                        <h3>My Profile</h3>
                    </x-nav-link>

                    <a href="" class="menu-item">
                        <span><img src="https://cdn.hugeicons.com/icons/view-stroke-rounded.svg" alt="view"
                                width="48" height="48" /></span>
                        <h3>Explore</h3>
                    </a>
                    <a href="" class="menu-item">
                        <span><img src="https://cdn.hugeicons.com/icons/notification-01-stroke-rounded.svg"
                                alt="notification-01" width="48" height="48" /></span>
                        <h3>Notifications</h3>
                    </a>
                    <a href="" class="menu-item">
                        <span><img src="https://cdn.hugeicons.com/icons/message-02-stroke-rounded.svg" alt="message-02"
                                width="48" height="48" /></span>
                        <h3>Messages</h3>
                    </a>
                    <div class="menu-item" id="theme" wire:click="$set('openModal', 'true')">
                        <span><img src="https://cdn.hugeicons.com/icons/paint-board-stroke-rounded.svg"
                                alt="paint-board" width="48" height="48" /></span>
                        <h3>Theme</h3>
                    </div>
                </aside>
                <!-- ------------------------------------------- Fin Aside ------------------------------------------- -->
            </div>
            <!-- ------------------------------------------- Fin Sección Izquierda ------------------------------------------- -->

            <!-- ------------------------------------------- Inicio Sección Principal ------------------------------------------- -->
            {{ $slot }}
            <!-- ------------------------------------------- Fin Sección Principal ------------------------------------------- -->

            <!-- ------------------------------------------- Inicio Sección Derecha ------------------------------------------- -->
            <div class="main-right">
                <div class="notifications">
                    <h4>Notificactions</h4>
                    <div class="notifications-search-bar">
                        <i class="fas fa-search"></i>
                        <input type="search" placeholder="Search user" id="notifications-search">
                    </div>
                    <div class="my-notifications">
                        <div class="notification">
                            <div class="profile-picture">
                                <img src="Assets/images/img/m1.jpg" alt="">
                            </div>
                            <div class="notification-body">
                                <h5>Nombre Usuario</h5>
                                <p class="text-gry">follows you.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ------------------------------------------- Fin Sección Derecha ------------------------------------------- -->
        </div>
    </main>
    @stack('modals')

    @livewireScripts
</body>

</html>
