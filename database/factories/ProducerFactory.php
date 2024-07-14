<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producer>
 */
class ProducerFactory extends Factory
{
    /**
     * Cria dados ficticios no banco de dados para teste.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nameProducer' => fake()->name(),
            'cpfProducer' => Str::random(11),
        ];
    }
}
