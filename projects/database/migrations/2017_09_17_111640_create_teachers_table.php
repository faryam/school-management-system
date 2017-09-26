<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
             $table->increments('teacher_id');
            $table->string('teacher_first_name',20);
            $table->string('teacher_last_name',20);
            $table->boolean('teacher_sex');
            $table->date('teacher_dob');
            $table->string('teacher_phone_number',50);
            $table->string('teacher_address',100);
            $table->date('teacher_join_date');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
