<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students_attendence extends Model
{
    
     protected $table = 'students_attendences';
    protected $primaryKey = 'student_attendence_id';
	public $timestamps = false;


	 public function course()
   {
   		return $this->hasOne('App\Course','course_id','course_id');
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
