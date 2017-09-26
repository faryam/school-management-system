<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_classrooms', function (Blueprint $table) {
            $table->increments('student_classroom_id');
            $table->integer('class_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->foreign('class_id')->references('class_id')->on('classrooms');
            $table->foreign('student_id')->references('student_id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_classrooms');
    }
}
