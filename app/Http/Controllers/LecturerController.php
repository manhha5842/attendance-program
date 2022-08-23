<?php

namespace App\Http\Controllers;

use App\Models\lecturer;

use App\Http\Requests\StorelecturerRequest;
use App\Http\Requests\UpdatelecturerRequest;
class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lecturer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(StorelecturerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
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
    public function edit(lecturer $lecturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelecturerRequest  $request
     * @param  \App\Models\lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelecturerRequest $request, lecturer $lecturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(lecturer $lecturer)
    {
        //
    }
}
