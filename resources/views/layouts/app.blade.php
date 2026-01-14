<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Data Center')</title>

    <!-- Your custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    @include('layouts.navigation')
    <main class="main-content">
        @yield('content')
    </main>

    
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>