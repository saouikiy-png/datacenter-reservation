@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="guest-container">
    <h1>Welcome to the Data Center</h1>
    <p>Please <a href="{{ route('login') }}">log in</a> or <a href="{{ route('register') }}">register</a> to access more features.</p>
</div>

<nav>
    <a href="{{ route('login') }}">Login</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}">Register</a>
    @endif
</nav>
@endsection
{{ $slot }}