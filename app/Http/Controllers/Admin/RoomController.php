<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreroomRequest;
use App\Http\Requests\UpdateroomRequest;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RoomController extends Controller
{
    private object $model;
    private string $table;
    public function __construct()
    {
        $this->model = room::query();
        $this->table = (new room())->getTable();

        View::share('title', 'Phòng học');
    }
    public function index()
    {
        $data = $this->model->paginate(6);

        return view("admin.$this->table.index", [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.$this->table.create");
    }

    public function store(StoreroomRequest $request)
    {
        $this->model->create([
            'name' => ucfirst($request->name),
        ]);
        return redirect()->route('admin.rooms.index');
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        return view("admin.$this->table.edit", [
            'each' => room::find($id),
        ]);
    }

    public function update(UpdateroomRequest $request, $id)
    {
        room::find($id)
            ->update(['name' => $request->name]);
        return redirect(route('admin.departments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // room::destroy($id);
        // return redirect()->back();
    }
}
