<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @include('layouts.partials.head')
    </head>

    <body>
        @include('layouts.partials.nav-bar-top')

        @include('layouts.partials.nav-bar')

        @yield('content')

        @include('layouts.partials.offer')

        @include('layouts.partials.brand')

        @include('layouts.partials.footer')

        <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

        @include('layouts.partials.js')
    </body>

</html>
