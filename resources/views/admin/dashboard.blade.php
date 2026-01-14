@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<h1>Admin Dashboard</h1>
<p>Welcome, {{ Auth::user()->name }}! Here you can manage users and resources.</p>

<ul>
  <li><a href="{{ route('admin.users') }}">View Users</a></li>
  <li><a href="#">Manage Resources</a></li>
</ul>
@endsection