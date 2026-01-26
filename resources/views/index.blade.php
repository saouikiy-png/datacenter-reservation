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

<main class="resources-container">

@foreach($categories as $category)
    <section class="resource-column">

        <div class="column-header category-item" data-category-id="{{ $category->id }}">
            {{ $category->name }}
            <span>▼</span>
        </div>

        <table class="resource-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>CPU</th>
                    <th>RAM</th>
                    <th>Storage</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($category->resources as $resource)
                    <tr>
                        <td>{{ $resource->name }}</td>
                        <td>{{ $resource->cpu }}</td>
                        <td>{{ $resource->ram }}</td>
                        <td>{{ $resource->storage }}</td>
                        <td>{{ $resource->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
@endforeach

</main>

<!-- FICHE DÉTAIL -->
<div id="resource-card" class="resource-card hidden">
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

</body>
</html>
