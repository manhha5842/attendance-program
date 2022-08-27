<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreassignmentRequest;
use App\Models\assignment;
use App\Models\classroom;
use App\Models\course;
use App\Models\department;
use App\Models\lecturer;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AssignmentController extends Controller
{
    private object $model;
    private string $table;
    public function __construct()
    {
        $this->model = assignment::query();
        $this->table = (new assignment())->getTable();

        View::share('title', 'Phân công lớp học');
    }

    public function index()
    {
        $data = $this->model->paginate();
        $courses_data = course::query()->get();
        $classrooms_data = classroom::query()->get();
        $lecturers_data = lecturer::query()->get();
        $rooms_data = room::query()->get();
        $departments_data = department::query()->get();

        return view("admin.$this->table.index", [
            'data' => $data,
            'lecturers_data' => $lecturers_data,
            'courses_data' => $courses_data,
            'classrooms_data' => $classrooms_data,
            'rooms_data' => $rooms_data,
            'departments_data' => $departments_data,
        ]);
    }

    public function create()
    {
        $courses_data = course::query()->get();
        $classrooms_data = classroom::query()->get();
        $lecturers_data = lecturer::query()->get();
        $rooms_data = room::query()->get();
        $departments_data = department::query()->get();

        return view("admin.$this->table.create", [
            'lecturers_data' => $lecturers_data,
            'courses_data' => $courses_data,
            'classrooms_data' => $classrooms_data,
            'rooms_data' => $rooms_data,
            'departments_data' => $departments_data,
        ]);
    }
    public function store(StoreassignmentRequest $request)
    {
        $arr = $request->validated();
        $this->model->create($arr);
        return redirect()->route('admin.lecturers.index');
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function importCsv(Request $request)
    {
        //
    }
}
