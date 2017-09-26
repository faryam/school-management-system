<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams_courses', function (Blueprint $table) {
            $table->increments('exam_course_id');
            $table->integer('course_id')->unsigned();
             $table->integer('exam_id')->unsigned();
             $table->foreign('course_id')->references('course_id')->on('courses');
            $table->foreign('exam_id')->references('exam_id')->on('exams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams_courses');
    }
}
