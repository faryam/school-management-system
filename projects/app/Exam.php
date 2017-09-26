<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';
    protected $primaryKey = 'exam_id';
	public $timestamps = false;

	public function course()
   {
   		return $this->hasOne('App\Course','course_id','course_id');
   }
}
