@extends('layouts.app')

@section('title', 'Manager Dashboard')

@section('content')
<style>
    /* Shared Styling mimicking products/index.blade.php */
    .dashboard-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-image: url("{{ asset('images/llginM.png') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        color: #232B36;
        padding-bottom: 60px;
    }

    .dashboard-header {
        background: linear-gradient(135deg, rgba(120, 86, 168, 0.9) 0%, rgba(119, 119, 223, 0.9) 100%);
        padding: 40px 0;
        text-align: center;
        color: white;
        margin-bottom: 40px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        backdrop-filter: blur(5px);
    }

    .dashboard-title {
        font-size: 2.2rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .dashboard-subtitle {
        font-size: 1rem;
        opacity: 0.95;
        margin-top: 5px;
        font-weight: 400;
    }

    .content-wrapper {
        max-width: 1400px; /* Wider for dashboard */
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Cards for Stats */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 8px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border-left: 5px solid #7856A8; /* Default Purple */
        transition: transform 0.2s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-title {
        color: #7f8c8d;
        margin-bottom: 10px;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
    }

    .stat-value {
        font-size: 2.5em;
        font-weight: 800;
        margin: 0;
        color: #3D2B6C;
    }

    /* Section Styling */
    .dashboard-section {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 40px;
        overflow: hidden;
    }

    .section-header {
        background-color: #f0f4ff;
        padding: 15px 20px;
        border-bottom: 1px solid #C4DEF8;
    }

    .section-title {
        color: #3D2B6C;
        font-size: 1.25rem;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
    }

    .section-title::before {
        content: '';
        display: inline-block;
        width: 6px;
        height: 20px;
        background-color: #7856A8;
        margin-right: 10px;
        border-radius: 3px;
    }

    /* Table Styling (Matching Products) */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }

    .custom-table th {
        background-color: #7777DF;
        color: white;
        font-weight: 600;
        padding: 12px 20px;
        font-size: 0.9rem;
        text-transform: uppercase;
        border-bottom: 2px solid #3D2B6C;
    }

    .custom-table td {
        padding: 12px 20px;
        border-bottom: 1px solid #edf2f7;
        color: #232B36;
        font-size: 0.95rem;
    }

    .custom-table tr:hover {
        background-color: #f5f3fa;
    }

    /* Badges & Buttons */
    .status-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .btn-action-green {
        background: #48bb78; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-weight: 600; font-size: 0.85rem; transition: 0.2s;
    }
    .btn-action-green:hover { background: #38a169; }

    .btn-action-red {
        background: #f56565; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-weight: 600; font-size: 0.85rem; transition: 0.2s;
    }
    .btn-action-red:hover { background: #e53e3e; }

    .btn-action-blue {
        background: #7856A8; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-weight: 600; font-size: 0.85rem; transition: 0.2s;
    }
    .btn-action-blue:hover { background: #3D2B6C; }

    /* Form Styles */
    .form-group { margin-bottom: 20px; }
    .form-label { display: block; margin-bottom: 8px; font-weight: 600; color: #3D2B6C; font-size: 0.9rem; }
    .form-control { width: 100%; padding: 12px; border: 1px solid #C4DEF8; border-radius: 6px; font-family: inherit; transition: 0.2s; }
    .form-control:focus { outline: none; border-color: #7856A8; box-shadow: 0 0 0 3px rgba(120, 86, 168, 0.2); }
    
    .btn-submit {
        width: 100%; padding: 14px; background: #3D2B6C; color: white; border: none; border-radius: 8px; cursor: pointer; font-size: 1rem; font-weight: 700; transition: background 0.3s;
    }
    .btn-submit:hover { background: #2a1b4e; }

</style>

<div class="dashboard-container">
    
    <div class="dashboard-header">
        <h1 class="dashboard-title">Manager Dashboard</h1>
        <p class="dashboard-subtitle">Control Panel for {{ Auth::user()->name }}</p>
    </div>

    <div class="content-wrapper">
        
        <!-- Alerts -->
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 30px; border: 1px solid #c3e6cb;">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 30px; border: 1px solid #f5c6cb;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card" style="border-left-color: #7856A8;">
                <div class="stat-title">Total Resources</div>
                <div class="stat-value">{{ $totalResources }}</div>
            </div>
            <div class="stat-card" style="border-left-color: #ed8936;">
                <div class="stat-title">Under Maintenance</div>
                <div class="stat-value" style="color: #ed8936;">{{ $underMaintenance }}</div>
            </div>
            <div class="stat-card" style="border-left-color: #e53e3e;">
                <div class="stat-title">Active Maintenances</div>
                <div class="stat-value" style="color: #e53e3e;">{{ $activeMaintenances->count() }}</div>
            </div>
            <div class="stat-card" style="border-left-color: #ecc94b;">
                <div class="stat-title">Pending Reservations</div>
                <div class="stat-value" style="color: #d69e2e;">{{ $pendingReservations->count() }}</div>
            </div>
        </div>

        <!-- Pending Reservations -->
        <div class="dashboard-section">
            <div class="section-header">
                <h2 class="section-title">Pending Reservations</h2>
            </div>
            <div style="overflow-x: auto;">
                @if($pendingReservations->isEmpty())
                    <div style="padding: 20px; text-align: center; color: #718096;">No pending reservations.</div>
                @else
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Resource</th>
                                <th>Dates</th>
                                <th style="text-align: right;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingReservations as $reservation)
                                <tr>
                                    <td>
                                        <strong>{{ $reservation->user->name }}</strong><br>
                                        <span style="font-size:0.85em; color:#718096">{{ $reservation->user->email }}</span>
                                    </td>
                                    <td>{{ $reservation->resource->name }}</td>
                                    <td>
                                        <div style="font-size: 0.9em;">
                                            From: <b>{{ $reservation->reservation_date }}</b><br>
                                            To: <b>{{ $reservation->return_date }}</b>
                                        </div>
                                    </td>
                                    <td style="text-align: right;">
                                        <div style="display: flex; gap: 8px; justify-content: flex-end;">
                                            <form action="{{ route('manager.reservation.approve', $reservation->id) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="btn-action-green">Approve</button>
                                            </form>
                                            <form action="{{ route('manager.reservation.reject', $reservation->id) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="btn-action-red">Reject</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
            
            <!-- Left Column -->
            <div>
                <!-- Active Maintenance -->
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2 class="section-title">Active Maintenance</h2>
                    </div>
                    @if($activeMaintenances->isEmpty())
                        <div style="padding: 20px; text-align: center; color: #718096;">No active maintenance tasks.</div>
                    @else
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>Resource</th>
                                    <th>Description</th>
                                    <th style="text-align: right;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activeMaintenances as $maintenance)
                                    <tr>
                                        <td><strong>{{ $maintenance->resource->name }}</strong></td>
                                        <td style="color: #4a5568;">{{ $maintenance->description }}</td>
                                        <td style="text-align: right;">
                                            <form action="{{ route('manager.maintenance.complete', $maintenance->id) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="btn-action-green">Complete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                <!-- Resource Inventory -->
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2 class="section-title">Resource Inventory</h2>
                    </div>
                    <div style="max-height: 500px; overflow-y: auto;">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th style="position: sticky; top: 0; z-index: 10;">Name</th>
                                    <th style="position: sticky; top: 0; z-index: 10;">Status</th>
                                    <th style="position: sticky; top: 0; z-index: 10; text-align: right;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($resources as $resource)
                                    <tr>
                                        <td>{{ $resource->name }}</td>
                                        <td>
                                            @php
                                                $bg = match($resource->status) {
                                                    'available' => '#C4DEF8', // matches blue
                                                    'maintenance' => '#FBD38D', // orange
                                                    default => '#FEB2B2' // red
                                                };
                                                $col = match($resource->status) {
                                                    'available' => '#2C5282',
                                                    'maintenance' => '#9C4221',
                                                    default => '#9B2C2C'
                                                };
                                            @endphp
                                            <span class="status-badge" style="background-color: {{ $bg }}; color: {{ $col }};">
                                                {{ ucfirst($resource->status) }}
                                            </span>
                                        </td>
                                        <td style="text-align: right;">
                                            <button onclick="selectResource('{{ $resource->id }}', '{{ $resource->name }}')" class="btn-action-blue">Select</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right Column: Scheduling -->
            <div>
                <div class="dashboard-section" style="position: sticky; top: 20px;">
                    <div class="section-header">
                        <h2 class="section-title">Schedule Maintenance</h2>
                    </div>
                    <div style="padding: 25px;">
                        <form action="{{ route('manager.maintenance.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Selected Resource</label>
                                <div style="display: flex; gap: 10px;">
                                    <input type="text" name="resource_id" id="resource_id_input" class="form-control" style="width: 70px; text-align: center; background: #e2e8f0;" readonly placeholder="ID" required>
                                    <input type="text" id="resource_name_display" class="form-control" style="flex: 1; background: #e2e8f0; font-weight: 600;" readonly placeholder="Select from list">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea name="description" rows="3" class="form-control" placeholder="Reason for maintenance..."></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Reservation Date</label>
                                <input type="date" name="reservation_date" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Return Date (Optional)</label>
                                <input type="date" name="return_date" class="form-control">
                            </div>

                            <button type="submit" class="btn-submit">Schedule Maintenance</button>
                            <p style="text-align: center; margin-top: 15px; font-size: 0.85rem; color: #718096;">Resource status will change to 'maintenance'.</p>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<script>
    function selectResource(id, name) {
        document.getElementById('resource_id_input').value = id;
        document.getElementById('resource_name_display').value = name;
        
        // Highlight form
        const formPanel = document.querySelector('.dashboard-section[style*="sticky"]');
        formPanel.style.boxShadow = "0 0 0 4px rgba(120, 86, 168, 0.4)";
        setTimeout(() => {
            formPanel.style.boxShadow = "0 4px 15px rgba(0,0,0,0.1)";
        }, 600);
    }
</script>
@endsection
