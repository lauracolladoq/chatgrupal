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
                    <label for="add-post" class="btn btn-primary">Add Post</label>
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
                    <a href="" class="profile">
                        <div class="profile-picture" id="my-profile-picture">
                            <img src="{{ Storage::url('users-avatar/' . auth()->user()->avatar) }}"
                                alt="My Profile Picture" />
                        </div>
                        <div class="profile-handle">
                            <h4 class="font-extrabold">{{ auth()->user()->name }}</h4>
                            <p class="text-gray"><span>@</span>{{ auth()->user()->username }}</p>
                        </div>
                    </a>
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
        <div id="default-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Terms of Service
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            With less than a month to go before the European Union enacts new consumer privacy laws for
                            its citizens, companies around the world are updating their terms of service agreements to
                            comply.
                        </p>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May
                            25 and is meant to ensure a common set of data rights in the European Union. It requires
                            organizations to notify users as soon as possible of high-risk data breaches that could
                            personally affect them.
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="default-modal" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                            accept</button>
                        <button data-modal-hide="default-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @stack('modals')
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
