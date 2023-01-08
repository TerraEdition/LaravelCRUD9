<?php

namespace App\Http\Controllers;

use App\Models\HobbyModel;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'data' => HobbyModel::all()
        ];
        return view('Hobby.Index', $data);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $data = [
            'data' => HobbyModel::with('Student')->findOrFail($id)
        ];
        return view('Hobby.Detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HobbyModel  $hobbyModel
     * @return \Illuminate\Http\Response
     */
    public function edit(HobbyModel $hobbyModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HobbyModel  $hobbyModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HobbyModel $hobbyModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HobbyModel  $hobbyModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(HobbyModel $hobbyModel)
    {
        //
    }
}
