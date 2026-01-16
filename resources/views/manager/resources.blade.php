@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Manager: Resources</h1>
    <p class="mb-4">Manage your assigned resources.</p>

    <div class="row">
        <div class="col-md-6">
            @foreach($categories as $category)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <button 
                            onclick="window.loadProducts({ $categoryid })" 
                            class="btn btn-primary btn-sm">
                            Show resources
                        </button>
                        
                        <ul id="products-{{ $category->id }}" class="list-group mt-3"></ul>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-6">
            <div id="product-card" class="card p-4 shadow d-none" style="position: sticky; top: 20px;">
                <h3 id="p-name" class="text-primary mb-3"></h3>
                <hr>
                <div class="details">
                    <p><strong>CPU:</strong> <span id="p-cpu"></span></p>
                    <p><strong>RAM:</strong> <span id="p-ram"></span></p>
                    <p><strong>Storage:</strong> <span id="p-storage"></span></p>
                    <p><strong>OS:</strong> <span id="p-os"></span></p>
                    <p><strong>Location:</strong> <span id="p-location"></span></p>
                    <p><strong>Status:</strong> <span id="p-status" class="badge bg-info text-dark"></span></p>
                </div>
            </div>
            
            <div id="no-selection" class="alert alert-secondary text-center">
                Cliquez sur une ressource pour voir les détails.
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/scripts.js') }}?v={{ time() }}"></script>
@endpush