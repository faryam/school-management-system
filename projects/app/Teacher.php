<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $primaryKey = 'teacher_id';
    public $timestamps = false;
    public function user()
   {
   		return $this->hasOne('App\User','id','user_id'); 
   }



   public function teachercourses()
   {
   		return $this->hasMany('App\Course_teacher','teacher_id','teacher_id');
   }
}
