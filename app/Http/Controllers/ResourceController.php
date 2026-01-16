<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
use App\Models\ResourceCategory;

class ResourceController extends Controller
{
    // Liste toutes les catégories avec leurs ressources
    public function index()
    {
        $categories = ResourceCategory::with('resources')->get();
        return view('resources.index', compact('categories'));
    }

    // Formulaire de création
    public function create()
    {
        $categories = ResourceCategory::all();
        return view('resources.create', compact('categories'));
    }

    // Ajouter une nouvelle ressource
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:resource_categories,id',
            'cpu' => 'nullable|string|max:255',
            'ram' => 'nullable|string|max:255',
            'storage' => 'nullable|string|max:255',
            'os' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

        Resource::create($request->all());

        return redirect()->route('resources.index')->with('success', 'Resource added successfully');
    }

    // Fiche détaillée d'une ressource
    public function show(Resource $resource)
    {
        return view('resources.show', compact('resource'));
    }

    // Formulaire de modification
    public function edit(Resource $resource)
    {
        $categories = ResourceCategory::all();
        return view('resources.edit', compact('resource', 'categories'));
    }

    // Mise à jour d'une ressource
    public function update(Request $request, Resource $resource)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:resource_categories,id',
            'cpu' => 'nullable|string|max:255',
            'ram' => 'nullable|string|max:255',
            'storage' => 'nullable|string|max:255',
            'os' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

        $resource->update($request->all());

        return redirect()->route('resources.index')->with('success', 'Resource updated successfully');
    }

    // Supprimer ou désactiver une ressource
    public function destroy(Resource $resource)
    {
        $resource->delete();
        return redirect()->route('resources.index')->with('success', 'Resource deleted successfully');
    }
}
