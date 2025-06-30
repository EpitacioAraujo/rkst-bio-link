<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'handler' => $this->faker->userName(),
            'description' => $this->faker->sentence(6, true),
            'picture' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker'),
        ];
    }
}
