<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teacher\TeacherCreatedRequest;
use App\Http\Requests\Teacher\TeacherEditRequest;
use App\Models\TeacherModel;
use Carbon\Carbon;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->s;
        $data = [
            'data' => TeacherModel::with('ClassRoom')
                ->where('teacher', 'like', '%' . $keyword . '%')
                ->orWhereHas('ClassRoom', function ($query) use ($keyword) {
                    $query->where('class', 'like', '%' . $keyword . '%');
                })
                ->paginate(10),
        ];
        return view('Teacher.Index', $data);
    }

    public function create()
    {
        return view("Teacher.Create");
    }

    public function store(TeacherCreatedRequest $request)
    {
        $newName = '';
        $data = new TeacherModel();
        if ($request->file('image')) {
            $newName = str_replace(' ', '-', $request->teacher) . '-' . Carbon::now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('Teacher', $newName);
            $data->image = $newName;
        }
        $data->teacher = $request->teacher;
        if ($data->save()) {
            Session::flash('bg', 'alert-success');
            Session::flash('message', 'Data Successfull Created');
        };
        return redirect('/teacher');
    }

    public function show($id)
    {
        $data = [
            'data' => TeacherModel::withTrashed()->with("ClassRoom.Student")->findOrFail($id)
        ];
        return view("Teacher.Detail", $data);
    }

    public function edit($id)
    {
        $data = [
            'data' => TeacherModel::findOrFail($id)
        ];;
        return view("Teacher.Edit", $data);
    }

    public function update(TeacherEditRequest $request, $id)
    {
        $data = TeacherModel::findOrFail($id);

        if ($request->file('image')) {
            if ($data->image != '') Storage::delete('Teacher/' . $data->image);
            $newName = str_replace(' ', '-', $request->teacher) . '-' . Carbon::now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('Teacher', $newName);
            $data->image = $newName;
        }
        $data->teacher = $request->teacher;
        if ($data->save()) {
            Session::flash('bg', 'alert-success');
            Session::flash('message', 'Data Successfull Updated');
        };
        return redirect('/teacher');
    }

    public function softDestroy($id)
    {
        $data = TeacherModel::findOrFail($id);
        if ($data->delete()) {
            Session::flash('bg', 'alert-success');
            Session::flash('message', 'Data Successfull Deleted');
        };
        return redirect('/teacher');
    }

    public function bin()
    {
        $data = [
            'data' => TeacherModel::onlyTrashed()->paginate(10),
        ];
        return view('Teacher/Bin', $data);
    }
    public function restore($id)
    {
        $data = TeacherModel::onlyTrashed()->findOrFail($id)->restore();
        if ($data) {
            Session::flash('bg', 'alert-success');
            Session::flash('message', 'Data Successfull Restored');
        };
        return redirect('/teacher');
    }
    public function hardDestroy($id)
    {
        $data = TeacherModel::withTrashed()->findOrFail($id);
        if ($data->forceDelete()) {
            Session::flash('bg', 'alert-success');
            Session::flash('message', 'Data Successfull Permanent Deleted');
        };
        return redirect('/teacher');
    }
}
