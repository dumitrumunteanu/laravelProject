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
        $start = $this->faker->dateTimeBetween('+0 days', '+30 days');
        $clone = clone $start;
        $end = $this->faker->dateTimeBetween($start, $clone->modify('+3 hours'));
        $recurrence = array('once', 'weekdays', 'daily', 'weekly', 'monthly');

        return [
            'course_id' => Course::all()->random()->id,
            'start' => $start,
            'end' => $end,
            'description' => $this->faker->sentence(),
            'recurrence_type' => $recurrence[array_rand($recurrence)],
        ];
    }
}
