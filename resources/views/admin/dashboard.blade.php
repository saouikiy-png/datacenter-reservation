@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="dashboard-container" style="max-width:1200px;margin:40px auto;">

    <h1 style="color:#3D2B6C;">Admin Dashboard</h1>
    <p style="color:#718096;">Welcome, {{ Auth::user()->name }}! Here is your overview.</p>

    <!-- Stats Cards -->
    <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:20px; margin-top:20px;">
        <div style="background:#ede9fe;padding:20px;border-radius:12px;">
            <strong>Users</strong>
            <h2 style="color:#3D2B6C;">{{ $usersCount }}</h2>
        </div>
        <div style="background:#f5f3ff;padding:20px;border-radius:12px;">
            <strong>Resources</strong>
            <h2 style="color:#3D2B6C;">{{ $resourcesCount }}</h2>
        </div>
        <div style="background:#fde2e2;padding:20px;border-radius:12px;">
            <strong>Incidents</strong>
            <h2 style="color:#e53e3e;">{{ $incidentsCount }}</h2>
        </div>
    </div>

    <!-- Live Logs -->
    <div style="margin-top:40px;">
        <h3 style="color:#3D2B6C;">Live Logs (Last 5)</h3>
        <div style="background:white;border-radius:12px;padding:15px;box-shadow:0 4px 6px rgba(0,0,0,0.1);">
            @forelse($logs as $log)
                <div style="border-bottom:1px solid #ede9fe; padding:8px 0;">
                    <strong>{{ $log->action }}</strong> - {{ $log->description }}
                    <div style="font-size:12px;color:#718096;">{{ $log->created_at->diffForHumans() }}</div>
                </div>
            @empty
                <p>No logs found.</p>
            @endforelse
        </div>
    </div>

    <!-- Charts -->
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:30px;margin-top:40px;">
        <canvas id="activityChart"></canvas>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('activityChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($activityChart['dates']) !!},
        datasets: [
            {
                label: 'Users',
                data: {!! json_encode($activityChart['users']) !!},
                borderColor: '#3D2B6C',
                fill: false
            },
            {
                label: 'Resources',
                data: {!! json_encode($activityChart['resources']) !!},
                borderColor: '#7c3aed',
                fill: false
            },
            {
                label: 'Incidents',
                data: {!! json_encode($activityChart['incidents']) !!},
                borderColor: '#e53e3e',
                fill: false
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>
@endsection
