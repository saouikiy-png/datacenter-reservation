@extends('layouts.app')

@section('title', 'Our Products')

@section('content')
<style>
    /* Global Page Styling with Purple/Blue Palette */
    .products-page-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        /* Background Image as requested */
        background-image: url("{{ asset('images/llginM.png') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        color: #232B36; /* Bunker */
        padding-bottom: 60px;
    }

    /* Header with Purple Gradient overlay */
    .products-header {
        background: linear-gradient(135deg, rgba(120, 86, 168, 0.9) 0%, rgba(119, 119, 223, 0.9) 100%); /* Studio to Medium Slate Blue */
        padding: 50px 0;
        text-align: center;
        color: white;
        margin-bottom: 40px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        backdrop-filter: blur(5px);
    }

    .products-title {
        font-size: 2.5rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .products-subtitle {
        font-size: 1.1rem;
        opacity: 0.95;
        margin-top: 5px;
        font-weight: 400;
    }

    /* Content Layout */
    .content-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Category Section */
    .category-section {
        background: rgba(255, 255, 255, 0.95); /* Slight transparency for background */
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 40px;
        overflow: hidden;
    }

    .category-header {
        background-color: #f0f4ff; /* Very light blue */
        padding: 15px 20px;
        border-bottom: 1px solid #C4DEF8; /* Patterns Blue */
    }

    .category-title {
        color: #3D2B6C; /* Minsk (Dark Purple) */
        font-size: 1.25rem;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
    }

    .category-title::before {
        content: '';
        display: inline-block;
        width: 6px;
        height: 20px;
        background-color: #7856A8; /* Studio (Purple) */
        margin-right: 10px;
        border-radius: 3px;
    }

    /* Table Styling */
    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }

    .custom-table th {
        background-color: #7777DF; /* Medium Slate Blue */
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
        color: #232B36; /* Bunker */
        font-size: 0.95rem;
    }

    .custom-table tr:hover {
        background-color: #f5f3fa; /* Light Purple tint */
    }

    /* Status Badge */
    .status-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
    }
    .status-available { background-color: #C4DEF8; color: #3D2B6C; } /* Patterns Blue bg */
    .status-maintenance { background-color: #e9d8fd; color: #7856A8; } /* Purple bg */
    .status-other { background-color: #e2e8f0; color: #4a5568; }

    /* Action Button */
    .btn-details {
        display: inline-block;
        background-color: #7856A8; /* Studio (Purple) */
        color: white;
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        transition: background-color 0.2s;
    }

    .btn-details:hover {
        background-color: #3D2B6C; /* Minsk (Hover Dark Purple) */
    }

</style>

<div class="products-page-container">
    
    <div class="products-header">
        <h1 class="products-title">Our Products</h1>
        <p class="products-subtitle">Explore our premium data resources</p>
    </div>

    <div class="content-wrapper">
        @foreach($categories as $category)
            @php
                // Mapping translations and definitions
                $info = match(strtolower(trim($category->name))) {
                    'serveur', 'serveurs', 'serveurs physiques' => [
                        'title' => 'Physical Servers',
                        'desc' => 'High-performance dedicated physical hardware for intensive workloads.'
                    ],
                    'stockage' => [
                        'title' => 'Storage Solutions',
                        'desc' => 'Secure and scalable storage systems for your critical data.'
                    ],
                    'réseau', 'reseau', 'equipements réseau' => [
                        'title' => 'Network Equipment',
                        'desc' => 'Routers, switches, and firewalls ensuring optimal connectivity.'
                    ],
                    'composant', 'composants' => [
                        'title' => 'Components',
                        'desc' => 'Individual hardware parts for upgrades and repairs.'
                    ],
                    'vm', 'machines virtuelles (vm)', 'machines virtuelles' => [
                        'title' => 'Virtual Machines',
                        'desc' => 'Flexible virtualized environments for development and deployment.'
                    ],
                    default => [
                        'title' => $category->name, // Fallback to DB name
                        'desc' => 'Reliable data center resources.'
                    ]
                };
            @endphp
            <div class="category-section">
                <div class="category-header">
                    <h2 class="category-title">{{ $info['title'] }}</h2>
                    <p style="margin: 5px 0 0 20px; color: #666; font-size: 0.9rem;">{{ $info['desc'] }}</p>
                </div>
                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Status</th>
                                <th style="width: 150px; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($category->resources as $resource)
                                <tr class="clickable-row" data-href="{{ route('products.show', $resource->id) }}" style="cursor: pointer;">
                                    <td><strong>{{ $resource->name }}</strong></td>
                                    <td>
                                        @php
                                            $statusClass = match(strtolower($resource->status)) {
                                                'available' => 'status-available',
                                                'maintenance' => 'status-maintenance',
                                                default => 'status-other'
                                            };
                                        @endphp
                                        <span class="status-badge {{ $statusClass }}">
                                            {{ $resource->status ?? 'Unknown' }}
                                        </span>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="{{ route('products.show', $resource->id) }}" class="btn-details">
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" style="text-align: center; padding: 20px; color: #a0aec0;">
                                        No resources available in this category.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach

        @if($categories->isEmpty())
        <div style="text-align: center; color: white;">
            <h3>No categories found. Please run seeders or add data.</h3>
        </div>
        @endif
    </div>

</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const rows = document.querySelectorAll(".clickable-row");
        rows.forEach(row => {
            row.addEventListener("click", () => {
                window.location.href = row.dataset.href;
            });
        });
    });
</script>
@endsection
