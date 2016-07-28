<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        		'name' => 'admin',
        		'email' => 'admin@admin.com',
        		'password' => bcrypt('adminadmin'),
        		'avatar' => 'http://www.davemroz.com/wp-content/uploads/2014/04/admin.png',
        	]);
    }
}
