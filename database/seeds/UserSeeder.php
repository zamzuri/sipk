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
        // sample admin
		App\User::create([
			'name' => 'Admin',
			'email' => 'admin@gmail.com',
			'password' => bcrypt('secret'),
			'role' => 'admin'
		]);
		
		// sample pegawai
		App\User::create([
			'name' => 'Pegawai',
			'email' => 'pegawai@gmail.com',
			'password' => bcrypt('secret'),
			'role' => 'pegawai'
		]);
    }
}
