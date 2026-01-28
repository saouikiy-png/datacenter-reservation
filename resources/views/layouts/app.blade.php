<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Data Center')</title>

    <!-- Custom Fonts: Montserrat & Lora -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,600;1,400&family=Montserrat:wght@300;400;600;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Your custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Force Global Fonts on EVERY element */
        * {
            font-family: 'Lora', serif;
        }
        
        /* Headers and specific UI elements typically get the sans-serif font */
        h1, h2, h3, h4, h5, h6, 
        .products-title, .about-title, .hello, 
        .nav-links a, 
        button, .btn, .btn-details, .btn-reserve, .btn-back,
        strong, b, th, .login-title, .register-title {
            font-family: 'Montserrat', sans-serif !important;
        }
    </style>
</head>

<body>
    @include('layouts.navigation')
    <main class="main-content">
        @yield('content')
    </main>

    
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>