<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreclassroomRequest;
use App\Models\classroom;
use App\Models\department;
use App\Models\lecturer;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateclassroomRequest;
use App\Imports\ClassroomImport;
use Maatwebsite\Excel\Facades\Excel;

class ClassroomController extends Controller
{
    private object $model;
    private string $table;
    public function __construct()
    {
        $this->model = classroom::query();
        $this->table = (new classroom())->getTable();

        View::share('title', 'Lớp học');
    }
    public function index()
    {

        $data = $this->model->paginate(3);
        $lecturers_data = DB::table('lecturers')->get();

        return view("admin.$this->table.index", [
            'data' => $data,
            'lecturers_data' => $lecturers_data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lecturers_data = lecturer::query()->get();
        $departments_data = department::query()->get();

        return view("admin.$this->table.create", [
            'lecturers_data' => $lecturers_data,
            'departments_data' => $departments_data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreclassroomRequest $request)
    {
        $arr = $request->validated();
        $this->model->create($arr);
        return redirect()->route('admin.classrooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturers_data = lecturer::query()->get();
        $departments_data = department::query()->get();

        return view('admin/classrooms.edit', [
            'each' => classroom::find($id),
            'lecturers_data' => $lecturers_data,
            'departments_data' => $departments_data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateclassroomRequest $request, $id)
    {
        classroom::find($id)
            ->update([
                'name' => $request->name,
                'lecturer_id' => $request->lecturer_id,
            ]);

        return redirect(route('admin.classrooms.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // department::destroy($id);
        // return redirect()->back();
    }
    public function importCsv(Request $request)
    {
        try {
            Excel::import(new ClassroomImport, $request->file('file'));
            // return redirect()->back()->with('success', 'success');
            return 1;
        } catch (\Throwable $th) {
            return "error";
        }
    }
}
