<?php

namespace App\Http\Controllers;

use App\Models\ClassRoomModel;
use App\Models\HobbyModel;
use App\Models\StudentHobbyModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'data' => StudentModel::with('ClassRoom')->get(),
        ];
        return view('Student.Index', $data);
    }

    public function create()
    {
        $data = [
            'class' => ClassRoomModel::select('id', 'class')->get(),
            'hobby' => HobbyModel::select('id', 'hobby')->get(),
        ];
        return view('Student.Create', $data);
    }

    public function store(Request $request)
    {
        $data = new StudentModel();
        $data->student = $request->student;
        $data->nis = $request->nis;
        $data->gender = $request->gender;
        $data->class_id = $request->class;
        $data->save();

        $id = StudentModel::select('id')->orderBy('id', 'desc')->first();
        $hobby = new StudentHobbyModel();
        $hobby->student_id = $id->id;
        $hobby->hobby_id = $request->hobby;
        $hobby->save();
        return redirect('/student');
    }

    public function show($id)
    {
        $data = [
            'data' => StudentModel::with(['ClassRoom.Teacher', 'Hobby'])->findOrFail($id)
        ];
        return view('Student.Detail', $data);
    }

    public function edit(ClassRoomModel $classRoomModel)
    {
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
