<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->foreignId('student_id')
                ->references('id')->on('students')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('phone')->unique();
            $table->string('address', 50);
        });
    }

    /**
     * Reverse the migrations.
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
