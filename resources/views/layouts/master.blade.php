<html>
    <head>
        <title>Test</title>
    </head>
    <body>
        @section('navbar')
            Contingut del navbar
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>