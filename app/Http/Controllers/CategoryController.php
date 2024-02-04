<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->categories;

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required',
            'couleur_hex' => 'required|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);
        auth()->user()->categories()->create($validatedData);
    
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'libelle' => 'required',
            'couleur_hex' => 'required|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        $category->update($validatedData);

        return redirect()->route('categories.edit', $category->id)->with('success', 'Catégorie modifiée avec succès');
    }

    public function confirmDelete(Category $category)
    {
        return view('categories.confirm-delete', compact('category'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès');
    }
}