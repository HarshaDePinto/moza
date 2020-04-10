<?php

namespace App\Http\Controllers\Recruitement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Applicant;
use App\Interview;
use App\Vacancy;
use App\Company;

class InterviewController extends Controller
{
    public function index()
    {
        return view('admin.interviews.index')->with('interviews', Interview::orderBy('updated_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.interviews.create')->with('applicants', Applicant::orderBy('updated_at', 'desc')->get())->with('vacancies', Vacancy::orderBy('updated_at', 'desc')->get());
    }

    public function applicant($id)
    {
        $applicant = Applicant::where('id', $id)->firstOrFail();
        $vacancies = Vacancy::where('category_id', $applicant->category_id)->get();
        return view('admin.interviews.create')->with('applicant', $applicant)->with('vacancies', $vacancies)->with('applicants', Applicant::orderBy('updated_at', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Interview::create($input);
        session()->flash('success',  'Interview Added Successfully!!!');
        return redirect(route('interview.index'));
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
}
