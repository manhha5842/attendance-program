<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\CourseImport;
use App\Models\course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class CourseController extends Controller
{
    private object $model;
    private string $table;
    public function __construct()
    {
        $this->model = course::query();
        $this->table = (new course())->getTable();

        View::share('title', 'Môn học');
    }

    public function index()
    {
        $data = $this->model->paginate(5);

        return view("admin.$this->table.index", [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return redirect(route('admin.courses.index'));
    }

    public function store(Request $request)
    {
        return redirect(route('admin.courses.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return redirect(route('admin.courses.index'));
    }

    public function update(Request $request, $id)
    {
        return redirect(route('admin.courses.index'));
    }

    public function destroy($id)
    {
        return redirect(route('admin.courses.index'));
    }
    public function importCsv(Request $request)
    {
        try {
            Excel::import(new CourseImport, $request->file('file'));
            return 1;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
