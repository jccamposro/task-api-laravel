<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modelo Task para la gestión de tareas en la aplicación.
// Utiliza Eloquent ORM de Laravel para interactuar con la base de datos.
// Incluye la fábrica HasFactory para facilitar la creación de instancias en pruebas y seeders.

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'user_id'];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
