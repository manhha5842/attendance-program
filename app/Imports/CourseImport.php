<?php

namespace App\Imports;

use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseImport implements ToArray, SkipsEmptyRows, WithHeadingRow
{
    public function array(array $array)
    {
        foreach ($array as $each) {
            try {
                $name = $each['mon_hoc'];
                $department = $each['nganh'];
                $department_id = DB::table('departments')->Where('name', $department)->get();
                course::updateOrCreate([
                    'name'  => $name,
                    'department_id'  => $department_id[0]->id,
                ]);
            } catch (\Throwable $e) {
                dd($each, $e);
            }
        }
    }
}
