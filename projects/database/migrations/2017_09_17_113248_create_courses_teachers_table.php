<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_teachers', function (Blueprint $table) {
           $table->increments('course_teacher_id');
            $table->integer('course_id')->unsigned();
             $table->integer('teacher_id')->unsigned();
             $table->foreign('course_id')->references('course_id')->on('courses');
            $table->foreign('teacher_id')->references('teacher_id')->on('teachers');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_teachers');
    }
}
