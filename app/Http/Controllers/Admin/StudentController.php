<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorestudentRequest;
use App\Imports\StudentImport;
use App\Models\classroom;
use App\Models\lecturer;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    private object $model;
    private string $table;
    public function __construct()
    {
        $this->model = student::query();
        $this->table = (new student())->getTable();

        View::share('title', 'Sinh viên');
    }
    public function index()
    {

        $data = $this->model->paginate(10);

        $classrooms_data = classroom::query()->get();
        return view("admin.$this->table.index", [
            'data' => $data,
            'classrooms_data' => $classrooms_data,
        ]);
    }

    public function create()
    {
        $classrooms_data = classroom::query()->get();
        return view("admin.$this->table.create", [
            'classrooms_data' => $classrooms_data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorestudentRequest $request)
    {

        if ($request->file('avatar') != null) {
            $path = Storage::putFile('avatars', $request->file('avatar'));
        } else {
            $path = null;
        }
        $arr = $request->validated();
        $arr['avatar'] = $path;
        $this->model->create($arr);
        return redirect()->route('admin.students.index');
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $classrooms_data =  classroom::query()->get();
        return view('admin/students.edit', [
            'each' => student::find($id),
            'classrooms_data' => $classrooms_data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->file('avatar') != null) {
            $path = Storage::putFile('avatars', $request->file('avatar'));
            lecturer::find($id)
                ->update(['avatar' => $path,]);
        }
        student::find($id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'classroom_id' => $request->classroom_id,
                'address' => $request->address,
                'birthday' => $request->birthday,
            ]);

        return redirect(route('admin.students.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function importCsv(Request $request)
    {
        try {
            Excel::import(new StudentImport, $request->file('file'));
            // return redirect()->back()->with('success', 'success');
            return 1;
        } catch (\Throwable $th) {
            return "error";
        }
    }
}
