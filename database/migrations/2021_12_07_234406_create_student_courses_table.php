<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_courses', function (Blueprint $table) {
            $table->foreignId('student_id')
                ->references('id')->on('students')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('course_id')
                ->references('id')->on('courses')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->primary(array('student_id', 'course_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_courses');
    }
}
