<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorelecturerRequest;
use App\Http\Requests\UpdatelecturerRequest;
use App\Imports\LecturerImport;
use App\Models\department;
use App\Models\lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class LecturerController extends Controller
{
    private object $model;
    private string $table;
    public function __construct()
    {
        $this->model = lecturer::query();
        $this->table = (new lecturer())->getTable();

        View::share('title', 'Giảng viên');
    }
    public function index()
    {
        $data = $this->model->paginate(5);
        $departments_data = DB::table('departments')->get();
        return view("admin.$this->table.index", [
            'data' => $data,
            'departments_data' => $departments_data,
        ]);
    }
    public function create()
    {
        $deparments_data =  department::query()->get();
        return view('admin/lecturers.create', [
            'deparments_data' => $deparments_data,
        ]);
    }

    public function store(StorelecturerRequest $request)
    {
        if ($request->file('avatar') != null) {
            $path = Storage::putFile('avatars', $request->file('avatar'));
        } else {
            $path = null;
        }

        $arr = $request->validated();
        $arr['avatar'] = $path;
        $this->model->create($arr);
        return redirect()->route('admin.lecturers.index');
    }

    public function show(lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit($lecturer)
    {
        $deparments_data =  department::query()->get();
        return view('admin/lecturers.edit', [
            'each' => lecturer::find($lecturer),
            'deparments_data' => $deparments_data,
        ]);
    }

    public function update(UpdatelecturerRequest $request, $lecturer)
    {
        if ($request->file('avatar') != null) {
            $path = Storage::putFile('avatars', $request->file('avatar'));
            lecturer::find($lecturer)
                ->update(['avatar' => $path,]);
        }
        lecturer::find($lecturer)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'department_id' => $request->department_id,
                'address' => $request->address,
                'birthday' => $request->birthday,
            ]);

        return redirect(route('admin.lecturers.index'));
    }

    public function destroy($lecturer)
    {
        // lecturer::destroy($lecturer);
        // return redirect()->back();
    }

    public function importCsv(Request $request)
    {
        try {
            Excel::import(new LecturerImport, $request->file('file'));
            // return redirect()->back()->with('success', 'success');
            return 1;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
