<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'course_id';
	public $timestamps = false;


	public function classes()
	{
		return $this->hasMany('App\Classroom','course_id','course_id');
	}


	public function coursestudent()
	{
		return $this->hasMany('App\Student_course','course_id','course_id');
	}

	public function exams()
	{
		return $this->hasMany('App\Exam','course_id','course_id');
	}

}
