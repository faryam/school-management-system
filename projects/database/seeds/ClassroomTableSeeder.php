<?php

use Illuminate\Database\Seeder;

class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('classrooms')->insert([
        'class_name'=>'abc',
        'class_section'=>'A',
        'class_date'=>'12/13/1990',
        'class_time'=>'12:00 PM',
        ]);
    }
}
