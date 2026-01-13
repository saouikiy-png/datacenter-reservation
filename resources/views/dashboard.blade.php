@extends('layouts.app')

@section('content')
    <h1>User Dashboard</h1>
    <p>Welcome! Check your reservations and requests here.</p>


    <div class="dropdown">
        <button class="dropdown-btn">
            Test Admin ▼
        </button>

        <nav class="dropdown-menu">
            <ul>
                <li><a href="{{ route('profile') }}">Profile</a></li>
                <li><a href="{{ route('logout') }}">Log out</a></li>
            </ul>
        </nav>
    </div>


@endsection