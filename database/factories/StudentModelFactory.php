<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student' => fake('id_ID')->unique()->firstName(),
            'nis' => fake('id_ID')->unique()->randomNumber(6, true),
            'class_id' => fake()->randomElement(['1', '2', '3', '4']),
            'gender' => fake()->randomElement(['L', 'P']),
        ];
    }
}
