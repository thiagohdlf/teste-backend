<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Cria dados ficticios no banco de dados para teste.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nameProperty' => fake()->name(),
            'ruralRegistration' => Str::random(6),
        ];
    }
}
