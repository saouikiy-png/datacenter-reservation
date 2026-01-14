@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
  <h1>Admin Dashboard</h1>
  <p>Welcome, {{ Auth::user()->name }}! Here you can manage users and resources.</p>

  <ul>
    <li><a href="{{ route('admin.users') }}">View Users</a></li>
    <li><a href="#">Manage Resources</a></li>
  </ul>
  <div class="dropdown">
    <button class="dropdown-btn">
      Menu ▼
    </button>

    <nav class="dropdown-menu">
      <ul>
        <li><a href="{{ route('profile') }}">Profile</a></li>
        <li><a href="{{ route('logout') }}">Log out</a></li>
      </ul>
    </nav>
  </div>

@endsection