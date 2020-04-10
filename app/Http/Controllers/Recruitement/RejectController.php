<?php

namespace App\Http\Controllers\Recruitement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Applicant;
use App\Interview;
use App\Vacancy;
use App\Company;
use App\Hire;
use App\Reject;

class RejectController extends Controller
{
    public function index()
    {
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

    public function applicant($id)
    {
        $applicant = Applicant::where('id', $id)->firstOrFail();

        return view('admin.rejects.create')->with('applicant', $applicant)->with('applicants', Applicant::orderBy('updated_at', 'desc')->get());
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
        $reject = Reject::create($input);
        $applicant = Applicant::where('id', $reject->applicant_id)->firstOrFail();
        $applicant->status = 'Rejected';
        $applicant->sn = 3;
        $applicant->save();
        session()->flash('success',  'Rejected Applicant Successfully!!!');
        return redirect(route('applicant.show', $applicant->id));
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
