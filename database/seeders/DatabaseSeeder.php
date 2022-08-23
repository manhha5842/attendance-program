<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        DB::table('Users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '123',
            'level' => '2',
        ]);
        DB::table('Users')->insert([
            'name' => 'Trần Hoàng Vân',
            'email' => 'lecturer@gmail.com',
            'password' => '123',
            'level' => '1',
        ]);
        DB::table('Users')->insert([
            'name' => 'Nguyễn Nam An',
            'email' => 'student@gmail.com',
            'password' => '123',
            'level' => '0',
        ]);
        DB::table('departments')->insert([
            'name' => 'Công nghệ thông tin',
        ]);
        DB::table('departments')->insert([
            'name' => 'Chính trị',
        ]);
        DB::table('departments')->insert([
            'name' => 'Kinh tế',
        ]);
    }
}
