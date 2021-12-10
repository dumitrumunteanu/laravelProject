<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            ALTER TABLE contacts
                CHANGE address address_line_1 VARCHAR(50),
                ADD address_line_2 VARCHAR(50);
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
            ALTER TABLE contacts
                CHANGE address_line_1 address VARCHAR(50),
                DROP address_line_2;
        ');
    }
}
