<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Rick & Morty Explorer!')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
    
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    @include('components.navigation')
    
    <main class="container mx-auto py-8">
        @yield('content')
    </main>
    
    @stack('scripts')
</body>
</html>