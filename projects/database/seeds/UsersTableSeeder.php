<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

        	'name'=>'parent',
        	'email'=>'parent@abc.com',
        	'password'=>bcrypt('par'),
        	'role_name'=>'parent',
        	'remember_token'=>str_random(10),


        ]);
    }
}
