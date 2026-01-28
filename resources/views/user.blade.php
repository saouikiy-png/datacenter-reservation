@extends('layouts.app')

@section('content')
    <h2> Your Profile</h2>
    <p><strong>Name :</strong> {{ $user->name }}</p>
    <p><strong>Email :</strong> {{ $user->email }}</p>
    <a href="/dashboard">Dashboard</a>
@endsection