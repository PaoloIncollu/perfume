<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/svg+xml" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQw7HGZeDZhcenqWe4MQTJ2N8BFRZQ4VOibKw&s" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Douglas</title>

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <header class="d-flex align-items-center">
            <nav class="navbar navbar-expand col-12">
                <div class="container">
                    
                    

                    <div class="collapse navbar-collapse" id="navbarText">

                        <img class="img-logo col-auto" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQw7HGZeDZhcenqWe4MQTJ2N8BFRZQ4VOibKw&s" alt="douglas">
                        <ul class="navbar-nav me-auto">
                            @auth
                               <!-- <li class="nav-item">
                                    <a class="nav-link fw-bold fs-4" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold fs-4" href="{{ route('admin.perfumes.index') }}">Profumi</a>
                                </li>-->

                            @endauth    
                            
                        </ul>

                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="btn btn-outline-danger fw-bold fs-4">
                                    Log Out
                                </button>
                            </form>
                        @else
                                
                            <h1 class="text-center fw-bold col" style="font-size: 60px">DOUGLAS</h1>
                                
                        @endauth
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-4">
            <div class="container">
                @yield('main-content')
            </div>
        </main>
    </body>
</html>
