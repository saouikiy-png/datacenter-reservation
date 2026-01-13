@extends('layouts.app')

@section('title', 'Liste des utilisateurs')

@section('content')
<div class="admin-users">

    <h1>Liste des utilisateurs</h1>

    <table class="users-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Status</th>
                <th>Créé le</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name ?? '—' }}</td>
                    <td>
                        <span class="{{ $user->status === 'actif' ? 'status-active' : 'status-disabled' }}">
                            {{ ucfirst($user->status) }}
                        </span>
                    </td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
