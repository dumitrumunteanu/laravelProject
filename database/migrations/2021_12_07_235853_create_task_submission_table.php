<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskSubmissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_submission', function (Blueprint $table) {
            $table->id();
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_submission');
    }
}
