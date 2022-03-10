<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Freelancers</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link  href="{{ asset('css/style_guest.css') }}" rel="stylesheet">
        <link  href="{{ asset('css/style_admin.css') }}" rel="stylesheet">
    
    </head>
    <body>
        <div class="container flex-center position-ref full-height d-flex align-items-center justify-content-between">
            <div>
                <a class="nav-link logo">
                    <img src="{{ asset('storage/img/logo.png') }}" >
                </a>
            </div>

            @if (Route::has('login'))
                <div class="top-right links d-flex justify-content-end m-4">
                    @auth
                        <a
                        class="text-colored {{ Route::currentRouteName() === 'admin.index' }} "
                         href="{{ route('admin.index') }}"> <h5>Il mio account</h5> </a>
                    @else
                        <a class="text-colored mr-4" href="{{ route('login') }} "> <h5>Accedi</h5> </a>

                        @if (Route::has('register'))
                            <a class="text-colored" href="{{ route('register') }} "> <h5>Registrati</h5> </a>
                        @endif
                    @endauth
                </div>
            @endif
            <div  class="content">

            </div>
        </div>

        <div id="app"></div>
        <script src="{{ asset('js/guest.js') }}"></script>
    
    </body>
</html>
