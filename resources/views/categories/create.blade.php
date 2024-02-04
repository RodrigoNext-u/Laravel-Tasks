<!-- resources/views/categories/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Créer une catégorie</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="libelle">Libellé :</label>
                <input type="text" name="libelle" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="couleur_hex">Couleur (hexadécimal) :</label>
                <input type="text" name="couleur_hex" class="form-control" pattern="#[0-9A-Fa-f]{6}" title="Couleur en hexadécimal (ex: #RRGGBB)" required>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection