<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_classrooms', function (Blueprint $table) {
            $table->increments('course_classroom_id');
            $table->integer('class_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->foreign('class_id')->references('class_id')->on('classrooms');
            $table->foreign('course_id')->references('course_id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_classrooms');
    }
}
