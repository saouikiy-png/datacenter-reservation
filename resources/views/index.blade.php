<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Resource Manager</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="header">
    <h1>PRODUCTS</h1>
    <p>our data resources</p>
</header>

<main class="grid">
    @foreach($categories as $category)
        <section class="column">
            <div class="column-title category-item"
                 data-category-id="{{ $category->id }}">
                {{ $category->name }}
                <span>▼</span>
            </div>

            <ul class="resource-list"
                id="products-{{ $category->id }}">
            </ul>
        </section>
    @endforeach
</main>

<!-- Card détail -->
<div id="resource-card" class="card hidden">
    <div class="card-header">
        <h3 id="r-name"></h3>
        <span class="close" onclick="closeCard()">✖</span>
    </div>

    <ul>
        <li><b>CPU :</b> <span id="r-cpu"></span></li>
        <li><b>RAM :</b> <span id="r-ram"></span></li>
        <li><b>Storage :</b> <span id="r-storage"></span></li>
        <li><b>OS :</b> <span id="r-os"></span></li>
        <li><b>Location :</b> <span id="r-location"></span></li>
        <li><b>Status :</b> <span id="r-status"></span></li>
    </ul>
</div>

<script src="{{ asset('js/resources.js') }}"></script>
</body>
</html>

