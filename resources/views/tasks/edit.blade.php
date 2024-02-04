<!-- edit.blade.php (Formulaire de modification) -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier la tâche</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nom de la tâche</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="date">Date de la tâche</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ $task->date }}" required>
                            </div>

                            <div class="form-group">
                                <label for="category">Catégorie de la tâche</label>
                                <input type="text" class="form-control" id="category" name="category" value="{{ $task->category }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
