<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            ALTER TABLE students
            ADD last_name VARCHAR(50) NOT NULL AFTER first_name,
            DROP temp_col,
            MODIFY first_name VARCHAR(50) NOT NULL;
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
            ALTER TABLE students
            DROP last_name,
            ADD temp_col VARCHAR(50) AFTER first_name,
            MODIFY first_name VARCHAR(50);
        ');
    }
}
