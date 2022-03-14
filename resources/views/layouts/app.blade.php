<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Freelancers @yield('title')</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('js/admin.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0-10/css/all.css" integrity="sha512-Dj9pt3sZROOuTTs9S89ykGZeu1XQgWKg3DVpu5tZALApsrWdd3tnVjTclUuVONaHM4O8GgCnjSbHlTKXrd2OWg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" integrity="sha512-u7ppO4TLg4v6EY8yQ6T6d66inT0daGyTodAi6ycbw9+/AU8KMLAF7Z7YGKPMRA96v7t+c7O1s6YCTGkok6p9ZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
  

    <!-- Styles -->
    <link href="{{ asset('css/style_admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style_guest.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar nav-freelancers navbar-expand-md navbar shadow-sm">
            <div class="container d-flex justify-content-betweenalign-items-center">
                <div class="d-flex align-items-center">
                    <a href=" {{route('welcome')}} " class="nav-link logo">
                        <img src="{{ asset('storage/img/logo.png') }}">
                    </a>
                    {{-- <span>
                        <a class="nav-link lead {{ (Route::currentRouteName() === '/') ? 'active' : '' }}" href="{{ route('welcome') }}">
                            Torna al sito
                        </a>
                    </span> --}}
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
                        <a class="nav-link {{ (Route::currentRouteName() === 'admin.message') ? 'active' : '' }}" 
                        href="{{ route('admin.message') }}"> 
                            Messaggi 
                        </a>
                        <a class="nav-link {{ (Route::currentRouteName() === 'admin.reviews') ? 'active' : '' }}" 
                        href="{{ route('admin.reviews') }}"> 
                            Recensioni 
                        </a>

                        <div class="dropdown show" >
                            
                            <a class="btn btn-light dropdown-toggle"  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                         
                                @if ($user->image)
                                    <span class="box-img-header">
                                        <img src="{{ asset('storage/' . $user->image) }}" alt="{{$user->name}}">
                                    </span>
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
