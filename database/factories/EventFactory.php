<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $minutes = [0, 15, 30, 45];
        $duration = [1, 2, 3]; //how long will a generated event be
        $recurrence = ['once', 'weekdays', 'daily', 'weekly', 'monthly'];

        $start = $this->faker->dateTimeBetween('-30 days', '+30 days');
        $start->setTime(rand(6, 17), $minutes[array_rand($minutes)]);

        $end = date('Y-m-d H:i:s', strtotime("{$start->format('Y-m-d H:i:s')} +{$duration[array_rand($duration)]} hours"));

        $course = Course::all()->random();
        return [
            'course_id' => $course->id,
            'start' => $start,
            'end' => $end,
            'title' => $course->title,
            'recurrence_type' => $recurrence[array_rand($recurrence)],
        ];
    }
}
