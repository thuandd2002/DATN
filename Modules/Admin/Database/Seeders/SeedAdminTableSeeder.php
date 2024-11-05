<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SeedAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'doantotnghiep@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
