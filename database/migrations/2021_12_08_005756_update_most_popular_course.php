<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMostPopularCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            UPDATE courses
            SET course_title = CONCAT(\'(MOST POPULAR) \', course_title)
            WHERE id = (
                SELECT course_id FROM student_courses
                GROUP BY course_id
                ORDER BY COUNT(course_id) DESC
                LIMIT 1
            );
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('
            UPDATE courses
            SET course_title = REPLACE(course_title, \'(MOST POPULAR) \', \'\')
            WHERE course_title LIKE \'(MOST POPULAR)%\';
        ');
    }
}
