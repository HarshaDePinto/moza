<?php

namespace App\Http\Controllers\StuAd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kl = level::all()->pluck('name');
        return view('students.admin.levels.index')->with('levels', Level::orderBy('updated_at', 'desc')->get())->with('kl', $kl);
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
        Level::create([
            'name' => $request->name,
            'des' => $request->des,
            'author' => $request->author

        ]);

        session()->flash('success',  'Level Added Successfully!!!');
        return redirect(route('stuLev.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $level = Level::where('id', $id)->firstOrFail();
        return view('students.admin.levels.single')->with('level', $level);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
