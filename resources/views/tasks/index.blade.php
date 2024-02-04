<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Liste des tâches</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-success mb-2">Ajouter une tâche</a>
        <a href="{{ route('categories.create') }}" class="btn btn-success mb-2">Ajouter une catégorie</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userTasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->date }}</td>
                        <td style="background-color: {{ $task->category->couleur_hex ?? '#FFFFFF' }}">{{ $task->category->libelle ?? 'Non définie' }}</td>
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Categories Table -->
        <h3>Catégories</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Couleur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userCategories as $category)
                    <tr>
                        <td>{{ $category->libelle }}</td>
                        <td style="background-color: {{ $category->couleur_hex ?? '#FFFFFF' }}"></td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Modifier</a>
                            <a href="{{ route('categories.confirm-delete', $category->id) }}" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
