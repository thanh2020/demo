<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $data = [
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123123'),
        ];
        DB::table('vp_users')->insert($data);
    }
}
