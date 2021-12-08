<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE TABLE students (
                id INT UNSIGNED AUTO_INCREMENT,
                first_name VARCHAR(50),
                temp_col VARCHAR(50),
                PRIMARY KEY (id)
            ) engine=innodb;
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
            DROP TABLE IF EXISTS students;
        ');
    }
}
