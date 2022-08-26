<?php

namespace App\Imports;

use App\Models\department;
use App\Models\Lecturer;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToArray;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class LecturerImport implements ToArray, WithHeadingRow, SkipsEmptyRows
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
                $name = $each['ten'];
                $time = strtotime($each['ngay_sinh']);
                $birthday = date('Y-m-d', $time);
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
                $department = $each['nganh'];
                $department_id = DB::table('departments')->Where('name', $department)->get();
                Lecturer::updateOrCreate([
                    'name'  => $name,
                    'email'  => $email,
                    'phone'  => $phone,
                    'birthday'  =>  $birthday,
                    'gender'  => $gender,
                    'address'  => $address,
                    'department_id'  => $department_id[0]->id,
                ]);
            } catch (\Throwable $e) {
                dd($each, $e);
            }
        }
    }
}
