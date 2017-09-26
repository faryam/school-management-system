<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
	protected $table = 'classrooms';
    protected $primaryKey = 'classroom_id';
	public $timestamps = false;

	public function course()
   {
   		return $this->hasOne('App\Course','course_id','course_id');
   }
 }
