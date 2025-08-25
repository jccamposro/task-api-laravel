<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_task_successfully()
    {
        $user = User::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . env('API_TOKEN')
        ])->postJson('/api/tasks', [
            'title' => 'Tarea de prueba válida',
            'description' => 'Descripción de prueba',
            'status' => 'pending',
            'user_id' => $user->id
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks', [
            'title' => 'Tarea de prueba válida',
            'user_id' => $user->id
        ]);
    }

    public function test_cannot_create_task_with_invalid_data()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . env('API_TOKEN')
        ])->postJson('/api/tasks', [
            'title' => 'abc', // muy corto
            'status' => 'invalid_status',
            'user_id' => 999 // no existe
        ]);

        $response->assertStatus(422);
    }

    public function test_delete_task_successfully()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . env('API_TOKEN')
        ])->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
