@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="hero">
    <h1>HELLO, THIS IS OUR DATA CENTER</h1>
    <input type="text" placeholder="Search...">
</section>

<!-- ABOUT US -->
<section id="about" style="padding:60px; background:#f5f5f5">
    <h2>About Us</h2>
    <p>
        Welcome to our data center, where we provides secure, scalable and high-availability
        infrastructure ,including servers, virtual machines, storage and
        networking equipment. We ensure reliability, performance and
        optimized resource reservation.
    </p>
</section>

<!-- RESOURCES -->
<section id="resources" style="padding:60px">
    <h2>Our Resources</h2>

    @foreach($categories as $category)
        <h3>{{ $category->name }}</h3>

        <div style="display:flex; gap:20px; flex-wrap:wrap">
            @foreach($category->resources as $resource)
                <div class="card">
                    <h4>{{ $resource->name }}</h4>
                    <p>CPU: {{ $resource->cpu }}</p>
                    <p>RAM: {{ $resource->ram }} GB</p>
                    <p>Status: {{ $resource->status }}</p>

                    <a href="{{ route('resources.show', $resource->id) }}">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
</section>

@endsection
