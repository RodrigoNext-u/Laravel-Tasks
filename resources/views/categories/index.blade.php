<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Your categories listing code goes here -->

        <a href="{{ route('tasks.index') }}" class="btn btn-primary">Go to Tasks</a>
    </div>
@endsection
