<!DOCTYPE html>
<html>
    <head>
        <title> {{$title or 'Tcc Academia'}}</title>
    </head>

    <body>

         @yield('content')
        @stack('scripts')
    </body>

</html>