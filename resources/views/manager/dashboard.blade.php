@extends('layouts.app')

@section('title', 'Manager Dashboard')

@section('content')
  <h1>Manager Dashboard</h1>
  <p>Welcome, {{ Auth::user()->name }}! Here you can view and manage your assigned resources.</p>

  <ul>
    <li><a href="{{ route('manager.resources') }}">View Resources</a></li>
  </ul>
  <div class="dropdown">
    <button class="dropdown-btn">
      ▼
    </button>

    <nav class="dropdown-menu">
      <ul>
        <li><a href="{{ route('profile') }}">Profile</a></li>
        <li><a href="{{ route('logout') }}">Log out</a></li>
      </ul>
    </nav>
  </div>

@endsection