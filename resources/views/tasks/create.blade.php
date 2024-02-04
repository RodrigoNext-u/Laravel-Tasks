<!-- resources/views/tasks/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Ajouter une tâche</h2>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="category_id">Catégorie existante:</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option value="" selected>Choisir une catégorie existante</option>
                    @foreach($userCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
