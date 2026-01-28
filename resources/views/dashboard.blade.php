@extends('layouts.app')

@section('content')
<div style="max-width:1100px;margin:40px auto;">

    <h1 style="color:#3D2B6C;">👋 Welcome, {{ Auth::user()->name }}</h1>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:30px;">

        {{-- Notifications Card --}}
        <div style="background:#f5f3ff;padding:20px;border-radius:12px;">
            <h3 style="color:#3D2B6C;">🔔 Notifications</h3>
            <p>Total: {{ $notificationsCount }}</p>

            <a href="{{ route('notifications.index') }}"
               style="display:inline-block;margin-top:10px;
               background:#3D2B6C;color:white;padding:8px 15px;
               border-radius:6px;text-decoration:none;">
                View all
            </a>
        </div>

        {{-- Reservations Card --}}
        <div style="background:#ede9fe;padding:20px;border-radius:12px;">
            <p style="font-weight:bold;color:#3D2B6C;">📅 My Reservations</p>
            <p>Total: {{ $reservationsCount }}</p>

            <a href="{{ route('reservations.my') }}"
               style="display:inline-block;margin-top:10px;
               background:#3D2B6C;color:white;padding:8px 15px;
               border-radius:6px;text-decoration:none;">
                View all
            </a>
        </div>

    </div>

</div>
@endsection
