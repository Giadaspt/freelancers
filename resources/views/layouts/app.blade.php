<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Freelancers @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style_admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style_guest.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar bg-dark shadow-sm">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <a class="nav-link">LOGO</a>
                    <span>
                        <a class="nav-link lead {{ (Route::currentRouteName() === '/') ? 'active' : '' }}" href="{{ route('home') }}">
                            Torna al sito
                        </a>
                    </span>
                    @auth

                    @endauth
                </div> 
                <div class="d-flex">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ (Route::currentRouteName() === 'login') ? 'active' : '' }}" href="{{ route('login') }}"> Login </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link {{ (Route::currentRouteName() === 'register') ? 'active' : '' }}" 
                            href="{{ route('register') }}"> Register </a>
                        </li>
                        
                    @endguest

                    @auth
                        <a class="nav-link {{ (Route::currentRouteName() === 'admin.index') ? 'active' : '' }}" 
                        href="{{ route('admin.index') }}"> 
                            Dashboard 
                        </a>

                        <a class="nav-link">Statistiche</a>

                        <div class="dropdown show" >
                            
                            <a class="btn btn-secondary dropdown-toggle"  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                         
                                @if ($user->image)
                                    <img width="30" height="30" src="{{ asset('storage/' . $user->image) }}" alt="{{$user->name}}" style="border-radius: 50%" >
                                @else
                                    <img width="30"  src="{{ asset('storage/img/istockphoto-1223671392-612x612.jpg')}}" alt="immagine" style="border-radius: 50%">
                                @endif                         
                                {{Auth::user()->email}}
                            </a>
                          
                            <div class="dropdown-menu"  aria-labelledby="dropdownMenuLink">
                              
                              <a class="nav-link dropdown-item"  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                                </a> </a>
                            </div>
                          </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
