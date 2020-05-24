<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        

        DB::table('users')->insert([
        	[
        		'name' 	=> 'Jhonnnn',
        		'email' => 'user1@gmail.com',
        		'password' => bcrypt('12341234'),

	        ],
	        [
        		'name' 	=> 'Jhonnnn 2',
        		'email' => 'user2@gmail.com',
        		'password' => bcrypt('12341234'),

	        ],
	        [
        		'name' 	=> 'Jhonnnn3',
        		'email' => 'user3@gmail.com',
        		'password' => bcrypt('12341234'),

	        ],
	    ]);
    }
}
