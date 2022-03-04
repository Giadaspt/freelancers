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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links d-flex justify-content-end m-4">
                    @auth
                        <a
                        class="{{ Route::currentRouteName() === 'admin.index' }} text-colored"
                         href="{{ route('admin.index') }}"> <h5>Il mio account</h5> </a>
                    @else
                        <a href="{{ route('login') }} text-colored"> <h5>Login</h5> </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }} text-colored"> <h5>Register</h5> </a>
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
