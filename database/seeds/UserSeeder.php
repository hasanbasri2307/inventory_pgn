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
        //
		DB::table('users')->insert([
			'name' => 'Hendra',
			'email' => 'hendra@gmail.com',
			'role' => 'admin',
            'status_user' => 1,
            'dep_id' => 8,
			'password' => bcrypt("arif"),
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:S")
		]);
    }
}
