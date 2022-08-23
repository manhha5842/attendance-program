<?php

namespace App\Imports;

use App\Models\Department;
use Maatwebsite\Excel\Concerns\ToArray;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DepartmentImport implements ToArray, WithHeadingRow
{
    public function array(array $array)
    {
        foreach ($array as $each) {
            try {
                $name = $each['nganh'];
                Department::updateOrCreate([
                    'name'  => $name,
                ]);
            } catch (\Throwable $e) {
                dd($each, $e);
            }
        }
    }
}
