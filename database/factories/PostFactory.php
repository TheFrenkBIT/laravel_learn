<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Post::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(10),
            'count_of_posts' => random_int(1, 200),
            'description' => $this->faker->text(100),
            'category_id' => Category::get()->random()->id
        ];
    }
}
