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
            SET title = CONCAT(\'(MOST POPULAR) \', title)
            WHERE id = (
                SELECT course_id FROM course_user
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
            SET title = REPLACE(title, \'(MOST POPULAR) \', \'\')
            WHERE title LIKE \'(MOST POPULAR)%\';
        ');
    }
}
