<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
        'is_completed' => 'boolean',
    ]);

    $validated['is_completed'] = $request->has('is_completed');

    Task::create($validated);

    return redirect()->route('tasks.index')
                     ->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
    return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
    $task->update([
    'title' => $request->title,
    'description' => $request->description,
    'due_date' => $request->due_date,
    'is_completed' => $request->is_completed ? 1 : 0,
    ]);

    $validated['is_completed'] = $request->has('is_completed');

    $task->update([
    'is_completed' => (int) $request->is_completed,
]);

    return redirect()->route('tasks.index')
                     ->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
    $task->delete();

    return redirect()->route('tasks.index')
                     ->with('success', 'Task deleted successfully!');
    }

    public function toggle(Task $task)
    {
    // Flip the boolean
    $task->is_completed = !$task->is_completed;
    $task->save();

    return redirect()->route('tasks.index')
                     ->with('success', 'Task status updated!');
    }


}
