<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsAttendencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_attendences', function (Blueprint $table) {
            $table->increments('student_attendence_id');
            $table->integer('student_id')->unsigned();
             $table->integer('class_id')->unsigned();
             $table->integer('course_id')->unsigned();
             $table->string('attendence_status',20);
             $table->string('attendence_date');
             $table->foreign('student_id')->references('student_id')->on('students');
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
        Schema::dropIfExists('students_attendences');
    }
}
