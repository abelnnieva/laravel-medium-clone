<?php

namespace Database\Factories;

use App\Models\Category;
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
        $title = fake()->sentence();
        return [
            "title" => $title,
            "slug" => \Illuminate\Support\Str::slug($title),
            "content" => fake()->paragraphs(3, true),
            "image" => fake()->imageUrl(640, 480, 'cats', true, 'Faker'),
            "category_id" => Category::inRandomOrder()->first()->id,
            "user_id" => User::inRandomOrder()->first()->id,
            "published_at" => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
