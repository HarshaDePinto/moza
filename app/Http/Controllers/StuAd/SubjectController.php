<?php

namespace App\Http\Controllers\StuAd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student\Level;
use App\Student\Subject;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kl = Subject::all()->pluck('name');
        return view('students.admin.subjects.index')->with('subjects', Subject::orderBy('updated_at', 'desc')->get())->with('kl', $kl);
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
        Subject::create([
            'name' => $request->name,
            'des' => $request->des,
            'level_id' => $request->level_id,
            'author' => $request->author

        ]);

        session()->flash('success',  'Subject Added Successfully!!!');
        return redirect(route('stuSub.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function addSub($id)
    {
        $level = Level::where('id', $id)->firstOrFail();
        return view('students.admin.subjects.create')->with('level', $level);
    }
}
