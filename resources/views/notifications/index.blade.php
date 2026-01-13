@extends('layouts.app')

@section('title', 'Centre des notifications')

@section('content')
<h1>Centre des notifications</h1>

@forelse($notifications as $notification)
    <div>
        <strong>{{ $notification->title }}</strong><br>
        {{ $notification->message }}
    </div>
@empty
    <p>Aucune notification</p>
@endforelse
@endsection

