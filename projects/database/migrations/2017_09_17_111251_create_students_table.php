<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('student_id');
            $table->string('student_first_name',20);
            $table->string('student_last_name',20);
            $table->boolean('student_sex');
            $table->date('student_dob');
            $table->string('student_phone_number',50);
            $table->date('student_join_date');
            $table->string('student_address',100);
            $table->integer('user_id')->unsigned();
            $table->integer('parent_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('parent_id')->references('parent_id')->on('parents');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
