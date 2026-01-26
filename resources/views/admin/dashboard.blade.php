@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div style="max-width: 800px; margin: 40px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
  <h1 style="color: #3D2B6C; margin-bottom: 10px;">Admin Dashboard</h1>
  <p style="color: #4a5568; margin-bottom: 20px;">Welcome, {{ Auth::user()->name }}! Here you can manage users.</p>

  <ul style="list-style: none; padding: 0;">
    <li style="margin-bottom: 15px;">
        <a href="{{ route('admin.users') }}" style="display: inline-block; padding: 10px 20px; background-color: #3D2B6C; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
            View Users
        </a>
    </li>
    {{-- Add more admin actions here --}}
  </ul>
</div>
@endsection