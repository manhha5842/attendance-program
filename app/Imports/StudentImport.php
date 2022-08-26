<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\students;
use Exception;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToArray, SkipsEmptyRows, WithHeadingRow
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
                $name = $each['ten'];ư
                // $birthday =  gmdate("Y-m-d", ($each['ngay_sinh'] - 25569) * 86400);
                if (strcasecmp($each['gioi_tinh'], "nam") == 0) {
                    $gender = 0;
                } else if (strcasecmp($each['gioi_tinh'], "nữ") == 0 || strcasecmp($each['gioi_tinh'], "nữ") == -108 || strcasecmp($each['gioi_tinh'], "nữ") == 108) {
                    $gender = 1;
                } else {
                    throw new Exception("Gender is null ");
                }

                $phone = $each['so_dien_thoai'];
                $email = $each['email'];
                $address = $each['dia_chi'];
                $classroom = $each['lop'];
                $classroom_id = DB::table('classrooms')->Where('name', $classroom)->get();
                student::updateOrCreate([
                    'name'  => $name,
                    'email'  => $email,
                    'phone'  => $phone,
                    'birthday'  =>  $birthday,
                    'gender'  => $gender,
                    'address'  => $address,
                    'classroom_id'  => $classroom_id[0]->id,
                ]);
            } catch (\Throwable $e) {
                dd($each, $e);
            }
        }
    }
}
