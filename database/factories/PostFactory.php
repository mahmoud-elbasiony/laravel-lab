<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->paragraphs(3, true),
            'user_id' => rand(1, 4),
            'isDeleted' => 0,
            'created_at'=>date('Y-m-d H:i:s',rand(1400000000,1670000000))
        ];
    }
}
