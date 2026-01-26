@extends('layouts.app')

@section('content')
<div style="max-width: 800px; margin: 40px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
    <h1 style="color: #3D2B6C; margin-bottom: 10px;">User Dashboard</h1>
    <p style="color: #4a5568; margin-bottom: 20px;">Welcome back, {{ Auth::user()->name }}!</p>

    <div style="display: flex; gap: 15px;">
        <a href="{{ route('resources.index') }}" style="display: inline-block; padding: 10px 20px; background-color: #3D2B6C; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
            Browse Resources
        </a>
        
        <!-- Add more user actions here later, e.g., My Reservations -->
    </div>
</div>
@endsection