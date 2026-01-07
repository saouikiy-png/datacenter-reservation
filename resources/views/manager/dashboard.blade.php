@extends('layouts.app')

@section('title', 'Manager Dashboard')

@section('content')
<h1>Manager Dashboard</h1>
<p>Welcome, {{ Auth::user()->name }}! Here you can view and manage your assigned resources.</p>

<ul>
  <li><a href="{{ route('manager.resources') }}">View Resources</a></li>
</ul>
@endsection