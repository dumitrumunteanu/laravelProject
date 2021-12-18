<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        Post::factory(10)->create();
        Comment::factory(50)->create();
        Course::factory(10)->create();

        User::all()->each(function ($user) {
            $courses = Course::all()->random(rand(1, 4))->pluck('id');
            $user->courses()->attach($courses);
        });
    }
}
