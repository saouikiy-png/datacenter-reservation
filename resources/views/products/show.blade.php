@extends('layouts.app')

@section('title', $resource->name . ' - Details')

@section('content')
<style>
    /* Purple/Blue Palette for Details Page - RE-APPLIED */
    .product-detail-page {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-image: url("{{ asset('images/llginM.png') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        padding: 40px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .detail-card {
        background: rgba(255, 255, 255, 0.98);
        width: 100%;
        max-width: 1000px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        display: flex;
        flex-direction: row; /* Split Layout */
        min-height: 500px;
        backdrop-filter: blur(5px);
    }

    /* Left Side */
    .image-section {
        flex: 1;
        background-color: #f4f7fe; /* Very light blue/purple */
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 40px;
        text-align: center;
        border-right: 1px solid #C4DEF8; /* Patterns Blue */
    }

    /* Product Image Styling */
    .product-image {
        max-width: 100%;
        max-height: 400px;
        object-fit: contain;
        margin-bottom: 20px;
        border-radius: 8px;
        transition: transform 0.3s;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .product-image:hover {
        transform: scale(1.02);
    }

    .image-caption {
        font-size: 0.9rem;
        color: #7856A8; /* Studio */
        font-weight: 600;
    }

    /* Right Side */
    .info-section {
        flex: 1;
        padding: 40px;
        display: flex;
        flex-direction: column;
    }

    .product-header {
        margin-bottom: 30px;
        border-bottom: 2px solid #C4DEF8;
        padding-bottom: 15px;
    }

    .product-name {
        font-size: 2rem;
        font-weight: 800;
        color: #3D2B6C; /* Minsk */
        margin: 0;
        line-height: 1.2;
    }

    .product-category {
        font-size: 1rem;
        color: #7777DF; /* Medium Slate Blue */
        margin-top: 5px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .detail-list {
        list-style: none;
        padding: 0;
        margin: 0;
        flex-grow: 1;
    }

    .detail-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px dashed #C4DEF8;
        font-size: 1rem;
    }

    .detail-label {
        font-weight: 600;
        color: #3D2B6C; /* Minsk */
    }

    .detail-value {
        color: #232B36; /* Bunker */
        font-family: 'Consolas', 'Monaco', monospace;
    }

    .actions {
        margin-top: 30px;
        display: flex;
        gap: 15px;
    }

    .btn-reserve {
        flex: 2;
        background-color: #7856A8; /* Studio */
        color: white;
        border: none;
        padding: 15px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.2s;
    }
    .btn-reserve:hover { background-color: #3D2B6C; }

    .btn-back {
        flex: 1;
        background-color: #C4DEF8;
        color: #3D2B6C;
        border: none;
        padding: 15px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.2s;
    }
    .btn-back:hover { background-color: #7777DF; color: white; }

    /* Responsive */
    @media (max-width: 768px) {
        .detail-card { flex-direction: column; }
        .image-section { min-height: 200px; }
    }
</style>

<div class="product-detail-page">
    <div class="detail-card">
        
        <!-- Left: Image Area -->
        <div class="image-section">
            @php
                // Explicit Mapping from User Request
                $imageMap = [
                    'HPE ProLiant MicroServer Gen10 Plus' => 'hpe.jpg',
                    'Cisco Business 250 Switch' => 'cisco.jpg',
                    'TP-Link Omada ER605' => 'TP-Link.jpg',
                    'AMD Ryzen 5 5600G' => 'AMD.jpg',
                    'Crucial RAM DDR4 16GB' => 'crucialram.jpg',
                    'SanDisk Extreme Portable' => 'sandisk.jpg',
                    'Samsung' => 'samsung.jpg', // Assuming there's a product named Samsung based on file existence
                ];

                // Logic to find the correct image
                $imagePath = 'images/llgin.png'; // Default fallback
                
                // 1. Check Explicit Map
                if (array_key_exists($resource->name, $imageMap) && file_exists(public_path('images/' . $imageMap[$resource->name]))) {
                    $imagePath = 'images/' . $imageMap[$resource->name];
                }
                // 2. Try ID based (e.g. 1.jpg)
                elseif(file_exists(public_path('images/' . $resource->id . '.jpg'))) {
                    $imagePath = 'images/' . $resource->id . '.jpg';
                }
                // 3. Try Exact Name (e.g. TP-Link.jpg)
                elseif(file_exists(public_path('images/' . $resource->name . '.jpg'))) {
                    $imagePath = 'images/' . $resource->name . '.jpg';
                }
                // 4. Try Sanitzed Name (e.g. San Disk -> sandisk.jpg)
                else {
                    $sanitized = strtolower(str_replace(' ', '', $resource->name));
                    if(file_exists(public_path('images/' . $sanitized . '.jpg'))) {
                        $imagePath = 'images/' . $sanitized . '.jpg';
                    }
                }
            @endphp

            <!-- Product Image -->
            <img src="{{ asset($imagePath) }}" 
                 alt="{{ $resource->name }}" 
                 class="product-image"
                 onerror="this.onerror=null; this.src='{{ asset('images/llgin.png') }}';">
                 
            <div class="image-caption">{{ $resource->name }}</div>
        </div>

        <!-- Right: Details Area -->
        <div class="info-section">
            <div class="product-header">
                <h1 class="product-name">{{ $resource->name }}</h1>
                <div class="product-category">{{ $resource->category->name ?? 'Uncategorized' }}</div>
            </div>

            <ul class="detail-list">
                <li class="detail-item">
                    <span class="detail-label">CPU</span>
                    <span class="detail-value">{{ $resource->cpu ?? 'N/A' }}</span>
                </li>
                
                <li class="detail-item">
                    <span class="detail-label">RAM</span>
                    <span class="detail-value">{{ $resource->ram ?? 'N/A' }}</span>
                </li>

                <li class="detail-item">
                    <span class="detail-label">Storage</span>
                    <span class="detail-value">{{ $resource->storage ?? 'N/A' }}</span>
                </li>

                <li class="detail-item">
                    <span class="detail-label">Bandwidth</span>
                    <span class="detail-value">{{ $resource->bandwidth ?? 'N/A' }}</span>
                </li>

                <li class="detail-item">
                    <span class="detail-label">OS</span>
                    <span class="detail-value">{{ $resource->os ?? 'N/A' }}</span>
                </li>

                <li class="detail-item">
                    <span class="detail-label">Location</span>
                    <span class="detail-value">{{ $resource->location ?? 'N/A' }}</span>
                </li>

                <li class="detail-item">
                    <span class="detail-label">Status</span>
                    <span class="detail-value">{{ $resource->status }}</span>
                </li>
            </ul>

            <div class="actions">
                <a href="{{ route('resources.index') }}" class="btn-back">Back</a>
                <a href="{{ route('reservation.create', ['resource_id' => $resource->id]) }}" class="btn-reserve">Reserve Now</a>
            </div>
        </div>

    </div>
</div>
@endsection
