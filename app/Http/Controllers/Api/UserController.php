<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;  

// Este controlador maneja las operaciones relacionadas con los usuarios en la API.
// Incluye métodos para listar todos los usuarios y obtener las tareas asociadas a un usuario específico.

class UserController extends Controller
{
    public function index()
{
    return response()->json(User::all());
}

public function tasks($id)
{
    $user = User::findOrFail($id);
    return response()->json($user->tasks);
}

}
