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
        $categories = ['Travel', 'Sports', 'Science', 'Music', 'Animals', 'Food']; 
        return [
            'title' => fake()->realText(20),
            'category' => $categories[array_rand($categories)],
            'message' => fake()->realText(800),
            'user_id' => 1,
        ];
    }
}
