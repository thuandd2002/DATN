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
        \DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'doantotnghiep@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
