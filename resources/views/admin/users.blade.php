@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')
<h1 style="color:#3D2B6C;">Manage Users</h1>
<table style="width:100%; border-collapse: collapse;">
    <thead>
        <tr style="background:#ede9fe;">
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role_id == 1 ? 'Admin' : ($user->role_id == 2 ? 'Manager' : 'User') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
