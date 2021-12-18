<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
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
            'description' => $this->faker->text(400),
            'image' => $this->faker->image('storage/app/public/course_img', $width = 150, $height = 150, $category = null, $fullPath = false),
        ];
    }
}
