<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert([
            'name' => 'Công nghệ thông tin',
        ], [
            'name' => 'Chính trị',
        ], [
            'name' => 'Kinh tế',
        ]);
    }
}
