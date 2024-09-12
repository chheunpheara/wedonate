<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'title' => \fake()->name(),
            'banner' => \fake()->image('public/resource/images', 640, 480, null, false),
            'start_date' => date('Y-m-d'),
            'due_date' => date('Y-m-d', strtotime('+1 months')),
            'description' => \fake()->text()
        ];
    }
}
