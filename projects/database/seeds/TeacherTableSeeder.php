<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('teachers')->insert([
        'teacher_first_name'=>'Umer',
        'teacher_last_name'=>'Ali',
        'teacher_sex'=>'1',
        'teacher_dob'=>Carbon::create('1990','12','13'),
        'teacher_phone_number'=>'03228066023',
        'teacher_address'=>'abc',
        'teacher_join_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        'user_id'=>'4',
        ]);
    }
}
