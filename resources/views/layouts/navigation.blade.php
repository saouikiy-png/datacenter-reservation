<nav class="navbar">
    <div class="container">
        <div class="logo">
            <a href="{{ route('dashboard') }}">Data Center</a>
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
                    <button type="submit">Log Out</button>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownBtn = document.getElementById('dropdownBtn');
        const dropdownContent = document.getElementById('dropdownContent');

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
    });
</script>