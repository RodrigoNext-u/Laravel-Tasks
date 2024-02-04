<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $userTasks = auth()->user()->tasks;
        $userCategories = auth()->user()->categories;

        return view('tasks.index', compact('userTasks', 'userCategories'));
    }

    public function create()
    {
        $userCategories = auth()->user()->categories;
        return view('tasks.create', compact('userCategories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'category_id' => 'nullable|exists:categories,id',
            'new_category' => 'nullable|string|max:255',
        ]);
    
        if ($validatedData['category_id'] === null && $validatedData['new_category'] !== null) {
            $newCategory = Category::create([
                'libelle' => $validatedData['new_category'],
                // You can set a default color or leave it null
            ]);
    
            $validatedData['category_id'] = $newCategory->id;
        }
    
        auth()->user()->tasks()->create($validatedData);
    
        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function show(Task $task)
    {
        $tasks = Task::orderBy('date')->get();

        return view('tasks.delete', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'category' => 'required',
        ]);

        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès');
    }
}
