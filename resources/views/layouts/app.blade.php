<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<body>
    @include('partials.navbar')

    <div class="container mx-auto mt-8">
        @yield('content')
    </div>

    @vite('resources/js/app.js')
</body>
</html>