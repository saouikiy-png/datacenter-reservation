<nav class="navbar">
    <div class="container">


        <ul class="nav-links">
            <li>
                @guest
            <li><a href="/">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Request Account</a></li>
            <li><a href="#">Our Resources</a></li>

            @else
            @if(auth()->user()->role->name === 'user')
            <a href="{{ route('dashboard') }}">Dashboard</a>

            @elseif(auth()->user()->role->name === 'manager')
            <a href="{{ route('manager.dashboard') }}">Dashboard</a>

            @elseif(auth()->user()->role->name === 'admin')
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            @endif
            @endguest
            </li>
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