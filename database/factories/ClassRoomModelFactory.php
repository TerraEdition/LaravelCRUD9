<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClassRoomModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'class' => fake('id_ID')->unique()->randomElement(['1A', '1B', '1C', '1D']),
            'teacher_id' => fake('id_ID')->unique()->randomElement(['1', '2', '3', '4', '5']),
        ];
    }
}
