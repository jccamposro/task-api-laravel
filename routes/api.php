<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TaskController;



Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}/tasks', [UserController::class, 'tasks']);

// Rutas relacionadas con los usuarios y sus tareas
Route::middleware('api.token')->group(function () {
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
    Route::get('/tasks', [TaskController::class, 'index']);

});
