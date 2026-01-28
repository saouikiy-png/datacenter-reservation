@extends('layouts.app')

@section('content')
<div style="max-width:900px;margin:40px auto;">
    <h2 style="color:#3D2B6C;">🔔 My Notifications</h2>

    @foreach($notifications as $notification)
        <div style="
            padding:12px;
            margin-bottom:10px;
            border-radius:8px;
            background: {{ $notification->is_read ? '#f3f4f6' : '#ddd6fe' }};
            font-weight: {{ $notification->is_read ? 'normal' : 'bold' }};
        ">
            {{ $notification->message }}
            <small style="color:gray;">
                ({{ $notification->created_at->diffForHumans() }})
            </small>
        </div>
    @endforeach
</div>
@endsection


