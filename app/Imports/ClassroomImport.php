<?php

namespace App\Imports;

use App\Models\Classroom;
use Exception;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClassroomImport implements ToArray, SkipsEmptyRows, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function array(array $array)
    {
        foreach ($array as $each) {
            try {
                $name = $each['lop'];
                $lecturer = $each['giang_vien'];
                $lecturer_id = DB::table('lecturers')->Where('name', $lecturer)->get();
                Classroom::updateOrCreate([
                    'name'  => $name,
                    'lecturer_id'  => $lecturer_id[0]->id,
                ]);
            } catch (\Throwable $e) {
                dd($each, $e);
            }
        }
    }
}
