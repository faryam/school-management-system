<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_exam_grade extends Model
{
    protected $table = 'students_exams_grades';
    protected $primaryKey = 'student_exam_grade_id';
	public $timestamps = false;


	public function exam()
	{
		return $this->hasOne('App\Exam','exam_id','exam_id');
	}


	public function student()
	{
		return $this->hasOne('App\Student','student_id','student_id');
	}


	public function class()
	{
		return $this->hasOne('App\Classroom','class_id','class_id');
	} 
}
