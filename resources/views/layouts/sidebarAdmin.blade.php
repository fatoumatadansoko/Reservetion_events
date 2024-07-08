<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">

    <script src="{{ asset('sidebar.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('dashboardAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('sidebar.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <body id="body-pd">
        <header class="header mb-5" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img">
                <img src="{{ asset('images/logo.png ') }}" alt="">
            </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="{{ route('dashboard') }}" class="nav_logo"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                    <div class="nav_list">
                        <a href="{{ route('dashboard') }}" class="nav_link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class='bx bx-home nav_icon'></i>
                            <span class="nav_name">Tableau de bord</span>
                        </a>

                        <a href="{{ route('users.index') }}" class="nav_link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                            <i class='bx bx-group nav_icon'></i>
                            <span class="nav_name">Gestion utilisateur</span>
                        </a>

                        <a href="{{ route('liste.association') }}" class="nav_link {{ request()->routeIs('liste.association') ? 'active' : '' }}">
                            <i class='bx bxs-business nav_icon'></i>
                            <span class="nav_name">Gestion association</span>
                        </a>

                        <a href="{{ route('liste.events') }}" class="nav_link {{ request()->routeIs('liste.events') ? 'active' : '' }}">
                            <i class='bx bx-calendar-check nav_icon'></i>
                            <span class="nav_name">Liste événements</span>
                        </a>

                        <a href="{{ route('permissions') }}" class="nav_link {{ request()->routeIs('permissions') ? 'active' : '' }}">
                            <i class='bx bx-cog nav_icon'></i>
                            <span class="nav_name">Permissions</span>
                        </a>
                    </div>
                </div>

                <a href="#" class="nav_link">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" class="nav_link"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class='bx bx-log-out nav_icon'></i>
                            <span class="nav_name"> {{ __('Déconnexion') }}</span>
                        </x-responsive-nav-link>
                    </form>
                </a>
            </nav>
        </div>

        <!--Container Main start-->
        <div class="height-100 bg-light p-5">
            <h4 class="p-5"></h4>
            @yield('content')
        </div>
        <!--Container Main end-->

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>
