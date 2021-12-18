<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_email' => $this->faker->email(),
            'message' => $this->faker->paragraph(),
            'post_id' => Post::all()->random()->id,
            'published_at' => $this->faker->dateTime(),
        ];
    }
}
