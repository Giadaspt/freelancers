<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Freelancers</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0-10/css/all.css" integrity="sha512-Dj9pt3sZROOuTTs9S89ykGZeu1XQgWKg3DVpu5tZALApsrWdd3tnVjTclUuVONaHM4O8GgCnjSbHlTKXrd2OWg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" integrity="sha512-u7ppO4TLg4v6EY8yQ6T6d66inT0daGyTodAi6ycbw9+/AU8KMLAF7Z7YGKPMRA96v7t+c7O1s6YCTGkok6p9ZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        <link  href="{{ asset('css/style_guest.css') }}" rel="stylesheet">
    
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a
                        class="{{ Route::currentRouteName() === 'admin.index' }}"
                         href="{{ route('admin.index') }}">Il mio account</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
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
