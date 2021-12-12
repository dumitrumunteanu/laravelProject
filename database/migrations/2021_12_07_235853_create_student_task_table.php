<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStudentTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_task', function (Blueprint $table) {
            $table->foreignId('task_id')
                ->references('id')->on('tasks')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('student_id')
                ->references('id')->on('students')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('submission_file_path');
            $table->dateTime('submission_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->primary(['task_id', 'student_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_task');
    }
}
