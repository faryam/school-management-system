<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsExamsGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_exams_grades', function (Blueprint $table) {
           $table->increments('student_exam_grade_id');
            $table->integer('student_id')->unsigned();
             $table->integer('exam_id')->unsigned();
             $table->string('exam_grade',20);
             $table->foreign('student_id')->references('student_id')->on('students');
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
        Schema::dropIfExists('students_exams_grades');
    }
}
