<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee_student extends Model
{
    protected $table = 'fee_students';
    protected $primaryKey = 'fee_student_id';
	public $timestamps = false;


	public function student()
	{
		return $this->hasOne('App\Student','student_id','student_id');
	}

    public function fee()
   {
   		return $this->hasOne('App\Fee','fee_id','fee_id');
   }

	  
}
