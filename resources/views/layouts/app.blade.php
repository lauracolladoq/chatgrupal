<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <!-- CDN SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CDN fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CDN TailWind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
                <input placeholder="Search User" />
            </div>
            @auth
                <!-- Si está autenticado aparece el boton de Add Post y la foto de perfil -->
                <div class="add-post">
                    @livewire('new-post')
                    <div class="profile-picture" id="my-profile-picture">
                        <img src="{{ Storage::url('users-avatar/' . auth()->user()->avatar) }}" alt="My Profile Picture" />
                    </div>
                </div>
                <!-- Si no está autenticado aparece el boton de Login -->
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            @endauth
        </div>
    </nav>
    <!-- Page Content -->
    <main>

        <div class="container main-container">
            <!-- ------------------------------------------- Inicio Sección Izquierda ------------------------------------------- -->

            <div class="main-left">
                <!-- -------------------- Perfil -------------------- -->
                @auth
                    @livewire('profile-info')
                @endauth

                <!-- ------------------------------------------- Inicio Aside ------------------------------------------- -->
                <aside>
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')"
                        class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <span><img src="https://cdn.hugeicons.com/icons/home-01-stroke-rounded.svg" alt="home-01"
                                width="48" height="48" /></span>
                        <h3 class="font-extrabold">Home</h3>
                    </x-nav-link>

                    <x-nav-link href="{{ route('index') }}" :active="request()->routeIs('index')"
                        class="menu-item {{ request()->routeIs('index') ? 'active' : '' }}">
                        <span> <img src="https://cdn.hugeicons.com/icons/user-stroke-rounded.svg" alt="user"
                                width="48" height="48" /></span>
                        <h3 class="font-extrabold">My Profile</h3>
                    </x-nav-link>

                    <x-nav-link href="{{ route('explore') }}" :active="request()->routeIs('home')"
                        class="menu-item {{ request()->routeIs('explore') ? 'active' : '' }}">
                        <span><img src="https://cdn.hugeicons.com/icons/view-stroke-rounded.svg" alt="view"
                                width="48" height="48" /></span>
                        <h3 class="font-extrabold">Explore</h3>
                    </x-nav-link>

                    <a href="" class="menu-item">
                        <span><img src="https://cdn.hugeicons.com/icons/notification-01-stroke-rounded.svg"
                                alt="notification-01" width="48" height="48" /></span>
                        <h3 class="font-extrabold">Notifications</h3>
                    </a>
                    <a href="" class="menu-item">
                        <span><img src="https://cdn.hugeicons.com/icons/message-02-stroke-rounded.svg" alt="message-02"
                                width="48" height="48" /></span>
                        <h3 class="font-extrabold">Messages</h3>
                    </a>
                    <a href="" class="menu-item">
                        <span><img src="https://cdn.hugeicons.com/icons/paint-board-stroke-rounded.svg"
                                alt="paint-board" width="48" height="48" /></span>
                        <h3 class="font-extrabold">Theme</h3>
                    </a>
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
                    <h4 class="font-extrabold">Notificactions</h4>
                    <div class="notifications-search-bar">
                        <i class="fas fa-search"></i>
                        <input placeholder="Search user" id="notifications-search" />
                    </div>
                    <div class="my-notifications">
                        <div class="notification">
                            <div class="profile-picture">
                                <img src="" alt="Profile Picture UserId" />
                            </div>
                            <div class="notification-body">
                                <h5 class="font-extrabold text-sm">Nombre Usuario</h5>
                                <p class="text-gray">follows you.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ------------------------------------------- Fin Sección Derecha ------------------------------------------- -->
        </div>
    </main>
    @livewireScripts
    <script>
        Livewire.on('mensaje', txt => {
            Swal.fire({
                icon: "success",
                title: txt,
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
</body>

</html>
