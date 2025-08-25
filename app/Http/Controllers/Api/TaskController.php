<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
// Este controlador gestiona las operaciones CRUD para el modelo Task.
// Incluye métodos para crear, actualizar, eliminar y listar tareas.
class TaskController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|min:5',
        'description' => 'nullable|max:500',
        'status' => 'in:pending,in_progress,completed',
        'user_id' => 'exists:users,id'
    ]);

    $task = Task::create($validated);

    return response()->json($task, 201);
}

public function update(Request $request, $id)
{
    $task = Task::findOrFail($id);

    $validated = $request->validate([
        'title' => 'sometimes|required|min:5',
        'description' => 'nullable|max:500',
        'status' => 'in:pending,in_progress,completed'
    ]);

    $task->update($validated);

    return response()->json($task);
}

public function destroy($id)
{
    $task = Task::findOrFail($id);
    $task->delete();

    return response()->json(['message' => 'Task deleted successfully']);
}

public function index()
{
    return Task::all();
}
}