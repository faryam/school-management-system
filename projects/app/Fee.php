<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $table = 'fees';
    protected $primaryKey = 'fee_id';
	public $timestamps = false;


	public function feestudents()
  {
    return $this->hasMany('App\Fee_student','fee_id','fee_id');
  }
}
