<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
	protected $table = 'parents';
	protected $primaryKey = 'parent_id';

	public $timestamps = false;
	
   public function user()
   {
   		return $this->hasOne('App\User','id','user_id'); 
   }

   public function childstudents()
	{
		return $this->hasMany('App\Student','parent_id','parent_id');
	}


   
}
