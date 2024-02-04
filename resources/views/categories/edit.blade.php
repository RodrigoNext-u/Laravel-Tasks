<!-- resources/views/categories/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Modifier la catégorie</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="libelle">Libellé :</label>
                <input type="text" name="libelle" class="form-control" value="{{ $category->libelle }}" required>
            </div>

            <div class="form-group">
                <label for="couleur_hex">Couleur (hexadécimal) :</label>
                <input type="text" name="couleur_hex" id="couleur_hex" class="form-control" value="{{ $category->couleur_hex }}" pattern="#[0-9A-Fa-f]{6}" title="Couleur en hexadécimal (ex: #RRGGBB)" required>
                <div id="color-preview" style="height: 30px; margin-top: 10px; background-color: {{ $category->couleur_hex }}"></div>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>

    <script>
        document.getElementById('couleur_hex').addEventListener('input', function () {
            var preview = document.getElementById('color-preview');
            preview.style.backgroundColor = this.value;
        });
    </script>
@endsection
