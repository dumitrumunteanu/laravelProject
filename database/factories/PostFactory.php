<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->words(1000, true),
            'user_id' => User::all()->random()->id,
            'image' => $this->faker->image('storage/app/public/blog_img', $width = 640, $height = 480, $category = null, $fullPath = false),
            'published_at' => $this->faker->dateTime(),
            'excerpt' => $this->faker->sentence(),
            'seo_title' => $this->faker->sentence(),
            'seo_description' => $this->faker->sentence(),
        ];
    }
}
