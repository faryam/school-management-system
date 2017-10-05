<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $table = 'finances';
    protected $primaryKey = 'finance_id';
	public $timestamps = false;
}
