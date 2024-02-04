<!-- resources/views/categories/confirm-delete.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Confirmer la suppression</h2>

        <p>Êtes-vous sûr de vouloir supprimer la catégorie "{{ $category->libelle }}" ?</p>

        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Supprimer</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection