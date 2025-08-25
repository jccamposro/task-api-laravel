<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->text(100),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed']),
            'user_id' => User::factory(),
        ];
    }
}
