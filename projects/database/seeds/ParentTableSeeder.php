<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ParentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	 DB::table('parents')->insert([
        'parent_first_name'=>'Ali',
        'parent_last_name'=>'Asif',
        'parent_last_name'=>'Asif',
        'parent_sex'=>'1',
        'parent_dob'=>Carbon::create('1980','5','10'),
        'parent_phone_number'=>'03228066023',
        'parent_address'=>'abc',
        'user_id'=>'4',
        ]);
    }
}
