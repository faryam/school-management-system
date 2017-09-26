<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_course extends Model
{

	protected $table = 'students_courses';
    protected $primaryKey = 'student_course_id';
	public $timestamps = false;


	public function student()
	{
		return $this->hasOne('App\Student','student_id','student_id');
	}

    public function course()
   {
   		return $this->hasOne('App\Course','course_id','course_id');
   }

	public function class()
   {
   		return $this->hasOne('App\Classroom','class_id','class_id');
   }   

}
