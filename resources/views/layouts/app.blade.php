<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ITLH') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-MluBx8q3wYpV7h/ZrL9Rb7G37zWc25yk1Mk0Q0o7+FZ8/NqA/7t0o/UEX9DH+kgzW1gTJLmT1TJZrcvZEZ+PQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @guest                         
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                @else 
                    @include('avatar.profile')
                @endguest    
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto ms-auto">
                         @guest
                         @else
                         <li class="nav-item">
                                    <a class="nav-link fw-bold" href="{{ route('services.all') }}">{{ __('Home') }}</a>
                                </li>
                        <li class="nav-item">
                                    <a class="nav-link fw-bold" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
                                </li>                         
                         <li class="nav-item">
                                    <a class="nav-link fw-bold" href="{{ route('schedule.index') }}">{{ __('Schedule') }}</a>
                                </li>       
                         <li class="nav-item">
                                    <a class="nav-link fw-bold" href="{{ route('bookings.index') }}">{{ __('Bookings') }}</a>
                                </li>       
                         
                         @endguest             
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="{{ route('profile.show' ) }}">{{ __('Profile') }}</a>
                                     <a class="dropdown-item" href="{{ route('services.index' ) }}">{{ __('Services') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>                                   

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <div class="container-fluid">
    <div class="row">
    <div class="col-sm-1"></div>
      <div class="col-sm-10">
            @yield('content')
            </div>
            <div class="col-sm-1"></div>
            </div>
            </div>
        </main>
        <footer class="bg-light text-center text-lg-start">
          <!-- Copyright -->
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-dark" href="https://www.itlh.in/">ITLH</a>
          </div>
          <!-- Copyright -->
        </footer>
    </div>
</body>
</html>
