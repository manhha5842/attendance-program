<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Http\Requests\StoredepartmentRequest;
use App\Http\Requests\UpdatedepartmentRequest;
use App\Http\Requests\Course\DestroyRequest;
use App\Imports\DepartmentImport;
use GrahamCampbell\ResultType\Success;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\TryCatch;

class DepartmentController extends Controller
{
    private object $model;
    private string $table;
    public function __construct()
    {
        $this->model = department::query();
        $this->table = (new department())->getTable();

        View::share('title', 'Ngành');
    }

    public function index()
    {
        $data = $this->model->paginate(3);

        return view("admin.$this->table.index", [
            'data' => $data,
        ]);
    }
    public function create()
    {
        return view('admin/departments.create');
    }
    public function store(StoredepartmentRequest $request)
    {
        $this->model->create([
            'name' => ucfirst($request->name),
        ]);

        // return redirect()->route('admin.departments.index');
    }

    public function show(department $department)
    {
        //
    }

    public function edit($department)
    {
        return view('admin/departments.edit', [
            'each' => department::find($department),
        ]);
    }

    public function update(UpdatedepartmentRequest $request, $department)
    {
        department::find($department)
            ->update(['name' => $request->name]);
        return redirect(route('admin.departments.index'));
    }

    public function destroy($department)
    {
        // department::destroy($department);
        // return redirect()->back();
    }
    public function importCsv(Request $request)
    {
        try {
            Excel::import(new DepartmentImport, $request->file('file'));
            // return redirect()->back()->with('success', 'success');
            return 1;
        } catch (\Throwable $th) {
            return "error";
        }
    }
}
