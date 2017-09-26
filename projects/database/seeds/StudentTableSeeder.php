<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('students')->insert([
        'student_first_name'=>'Hassan',
        'student_last_name'=>'Ali',
        'student_sex'=>'1',
        'student_dob'=>Carbon::create('2000','12','16'),
        'student_phone_number'=>'03228066023',
        'student_join_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        'student_address'=>'abc',
        'user_id'=>'2',
        'parent_id'=>'1',
        ]);
    }
}
