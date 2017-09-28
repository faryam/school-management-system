<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
	protected $table = 'classrooms';
    protected $primaryKey = 'class_id';
	public $timestamps = false;

	public function course()
   {
   		return $this->hasOne('App\Course','course_id','course_id');
   }

   public function classteacher()
	{
		return $this->hasMany('App\Course_teacher','class_id','class_id');
	}


	


 }
