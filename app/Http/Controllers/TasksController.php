<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks; 

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Tasks::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Tasks::create($request->only(['title', 'description']));
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function show(Tasks $tasks) // Changed parameter variable to match model name
    {
        return view('tasks.show', compact('tasks'));
    }

    public function edit(Tasks $tasks)
    {
        return view('tasks.edit', compact('tasks'));
    }

    public function update(Request $request, Tasks $tasks)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'sometimes|boolean', // Added 'sometimes' to prevent errors
        ]);

        $tasks->update($request->only(['title', 'description', 'is_completed']));
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy(Tasks $tasks)
    {
        $tasks->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
