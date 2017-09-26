<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam_class extends Model
{
     protected $table = 'exam_classes';
    protected $primaryKey = 'exam_class_id';
	public $timestamps = false;


	public function exam()
	{
		return $this->hasOne('App\Exam','exam_id','exam_id');
	}


	public function class()
   {
   		return $this->hasOne('App\Classroom','class_id','class_id');
   }   
}
