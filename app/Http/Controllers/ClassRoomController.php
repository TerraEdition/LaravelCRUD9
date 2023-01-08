<?php

namespace App\Http\Controllers;

use App\Models\ClassRoomModel;
use App\Models\TeacherModel;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'data' => ClassRoomModel::get()
        ];
        return view('ClassRoom.Index', $data);
    }

    public function create()
    {
        $data = [
            'teacher' => TeacherModel::get()
        ];
        return view("ClassRoom.Create", $data);
    }

    public function store(Request $request)
    {
        $data = new ClassRoomModel();
        $data->teacher_id = $request->teacher;
        $data->class = $request->class_room;
        $data->save();
        return redirect("/classroom");
    }

    public function show($id)
    {
        $data = [
            'data' => ClassRoomModel::with(['Teacher', 'Student'])->findOrFail($id)
        ];
        return view('ClassRoom.Detail', $data);
    }

    public function edit(ClassRoomModel $classRoomModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassRoomModel  $classRoomModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassRoomModel $classRoomModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoomModel  $classRoomModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRoomModel $classRoomModel)
    {
        //
    }
}
