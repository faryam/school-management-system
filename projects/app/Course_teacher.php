<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_teacher extends Model
{
    protected $table = 'courses_teachers';
    protected $primaryKey = 'course_teacher_id';
	public $timestamps = false;


	public function teacher()
	{
		return $this->hasOne('App\Teacher','teacher_id','teacher_id');
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
