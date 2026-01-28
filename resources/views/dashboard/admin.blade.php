@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<style>
    :root {
        --primary-teal: #00bfa5;
        --hover-teal: #02776b;
        --bg-light: #f0fdfa;
        --card-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    body {
        font-family: sans-serif;
    }

    .dashboard-container {
        background: var(--bg-light);
        padding: 30px;
        min-height: 100vh;
    }

    .dashboard-title {
        color: var(--hover-teal);
        margin-bottom: 30px;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
    }

    .card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        transition: transform 0.2s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card h3 {
        color: var(--primary-teal);
        margin-bottom: 10px;
    }

    .card a {
        text-decoration: none;
        color: var(--hover-teal);
        font-weight: bold;
    }
</style>

<div class="dashboard-container">
    <h1 class="dashboard-title">Dashboard Admin</h1>

    <div class="cards">
        <div class="card">
            <h3>👤 Utilisateurs</h3>
            <p>Gestion des utilisateurs</p>
            <a href="{{ url('/admin/users') }}">Voir la liste</a>
        </div>

        <div class="card">
            <h3>🔔 Notifications</h3>
            <p>Centre des notifications</p>
            <a href="{{ url('/notifications') }}">Voir</a>
        </div>

        <div class="card">
            <h3>⚠️ Incidents</h3>
            <p>Signalement des incidents</p>
            <a href="{{ url('/incidents') }}">Voir</a>
        </div>

        <div class="card">
            <h3>📄 Logs</h3>
            <p>Journal des actions</p>
            <a href="{{ url('/logs') }}">Voir</a>
        </div>
    </div>
</div>
@endsection
