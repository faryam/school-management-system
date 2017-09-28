<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{


	protected $primaryKey = 'student_id';
	public $timestamps = false;
 
    public function user()
   {
   		return $this->hasOne('App\User','id','user_id'); 
   }


   public function parent()
   {
   		return $this->hasOne('App\ParentModel','parent_id','parent_id');
   }


   public function studentcourses()
  {
    return $this->hasMany('App\Student_course','student_id','student_id');
  }


  public function studentexams()
  {
    return $this->hasMany('App\Student_exam_grade','student_id','student_id');
  }
}
