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
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <a href="{{ route('dashboard') }}">My Data Center</a>
            </div>

            <ul class="nav-links">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            </ul>

            @auth
            <div class="dropdown">
                <button id="dropdownBtn">{{ Auth::user()->name }} ▼</button>
                <div id="dropdownContent" class="dropdown-content">
                    <a href="{{ route('profile.edit') }}">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">Log Out</button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </nav>

    <main class="main-content">
        @yield('content')
    </main>

    <!-- Your custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>