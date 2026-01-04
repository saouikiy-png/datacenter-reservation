<nav class="navbar">
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <a href="{{ route('dashboard') }}">
                <x-application-logo />
            </a>
        </div>

        <!-- Menu Links -->
        <ul class="nav-links">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
            </li>
        </ul>

        <!-- Profile Dropdown -->
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

        <!-- Hamburger Menu -->
        <button class="hamburger" id="hamburgerBtn">☰</button>
    </div>

    <!-- Responsive Menu -->
    <div id="mobileMenu" class="mobile-menu">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        @auth
        <a href="{{ route('profile.edit') }}">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">Log Out</button>
        </form>
        @endauth
    </div>
</nav>

<style>
    /* --- Reset de base --- */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
    }

    /* --- Navbar --- */
    .navbar {
        background-color: #fff;
        border-bottom: 1px solid #ccc;
        position: relative;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 20px;
    }

    .logo img {
        height: 40px;
    }

    /* --- Menu Links --- */
    .nav-links {
        list-style: none;
        display: flex;
        gap: 15px;
    }

    .nav-links a {
        text-decoration: none;
        color: #333;
        padding: 5px 10px;
    }

    .nav-links a.active {
        font-weight: bold;
        border-bottom: 2px solid #333;
    }

    /* --- Dropdown --- */
    .dropdown {
        position: relative;
    }

    .dropdown button {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        top: 100%;
        background-color: #fff;
        border: 1px solid #ccc;
        min-width: 150px;
        z-index: 1000;
    }

    .dropdown-content a,
    .dropdown-content button {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: #333;
        width: 100%;
        text-align: left;
        background: none;
        border: none;
        cursor: pointer;
    }

    .dropdown-content a:hover,
    .dropdown-content button:hover {
        background-color: #f0f0f0;
    }

    /* --- Hamburger --- */
    .hamburger {
        display: none;
        font-size: 24px;
        background: none;
        border: none;
        cursor: pointer;
    }

    /* --- Mobile Menu --- */
    .mobile-menu {
        display: none;
        flex-direction: column;
        padding: 10px 20px;
        background-color: #fff;
    }

    .mobile-menu a,
    .mobile-menu button {
        padding: 10px 0;
        text-decoration: none;
        color: #333;
        border-bottom: 1px solid #eee;
    }

    /* --- Responsive --- */
    @media (max-width: 768px) {

        .nav-links,
        .dropdown {
            display: none;
        }

        .hamburger {
            display: block;
        }
    }
</style>

<script>
    // Toggle dropdown
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownBtn = document.getElementById('dropdownBtn');
        const dropdownContent = document.getElementById('dropdownContent');
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        if (dropdownBtn) {
            dropdownBtn.addEventListener('click', () => {
                dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
            });
            document.addEventListener('click', e => {
                if (!dropdownBtn.contains(e.target) && !dropdownContent.contains(e.target)) {
                    dropdownContent.style.display = 'none';
                }
            });
        }

        if (hamburgerBtn) {
            hamburgerBtn.addEventListener('click', () => {
                mobileMenu.style.display = mobileMenu.style.display === 'flex' ? 'none' : 'flex';
            });
        }
    });
</script>