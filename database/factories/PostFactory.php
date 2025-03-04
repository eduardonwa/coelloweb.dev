<?php

namespace Database\Factories;

use App\Models\User;
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
            'title' => fake()->sentence(),
            'body' => fake()->paragraphs(3, true),
            'thumbnail' => fake()->imageUrl(),
            'slug' => fake()->slug(),
            'caption' => fake()->sentence(5),
            'meta_title' => fake()->sentence(),
            'meta_description' => fake()->text(),
            'active' => fake()->boolean,
            'published_at' => fake()->dateTime,
            'category_id' => fake()->numberBetween(1, 4),
            'user_id' => User::factory()
        ];
    }
}
