<nav class="navbar">
    <div class="container">
        <ul class="nav-links">

            @guest
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Request Account</a></li>

                <!-- PUBLIC RESOURCES -->
                <li><a href="{{ route('resources.index') }}">Our Resources</a></li>
                @else

                @if(auth()->user()->role->name === 'user')
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>

                @elseif(auth()->user()->role->name === 'manager')
                    <li><a href="{{ route('manager.dashboard') }}">Dashboard</a></li>

                @elseif(auth()->user()->role->name === 'admin')
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                @endif

                <li><a href="{{ route('resources.index') }}">Our Resources</a></li>

            @endguest
        </ul>

        @auth
            <div class="dropdown">
                <button id="dropdownBtn">{{ Auth::user()->name }} ▼</button>
                <div id="dropdownContent" class="dropdown-content">
                    <a href="{{ route('profile.edit') }}">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Log Out</button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
