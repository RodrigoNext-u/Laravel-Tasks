<!-- tasks/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Task Details</h2>
        <p>Name: {{ $task->name }}</p>
        <p>Date: {{ $task->date }}</p>

        {{-- Check if the task has an associated category --}}
        @if ($task->category)
            <p>Category: {{ $task->category->libelle }}</p>
            <p style="background-color: {{ $task->category->couleur_hex ?? '#ffffff' }};">Color: {{ $task->category->couleur_hex }}</p>
        @else
            <p>No category assigned</p>
        @endif

        <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back to tasks</a>
    </div>
@endsection
