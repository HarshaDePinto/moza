<?php

namespace App\Http\Controllers\Recruitement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Applicant;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Title;

class ApplicantController extends Controller
{
    public function index()
    {
        return view('admin.applicants.index')->with('applicants', Applicant::orderBy('updated_at', 'desc')->get())->with('categories', Category::orderBy('updated_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.applicants.create')->with('titles', Title::orderBy('updated_at', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->image->store('applicants');
        } else {
            $image = '';
        }
        if ($request->hasFile('cv')) {
            $cv = $request->cv->store('applicants');
        } else {
            $cv = '';
        }
        if ($request->hasFile('cl')) {
            $cl = $request->cl->store('applicants');
        } else {
            $cl = '';
        }
        if ($request->hasFile('ot')) {
            $ot = $request->ot->store('applicants');
        } else {
            $ot = '';
        }





        Applicant::create([
            'title_id' => $request->title_id,
            'name' => $request->name,
            'profile' => $request->profile,
            'country' => $request->country,
            'email' => $request->email,
            'tel' => $request->tel,
            'experience' => $request->experience,
            'c_job' => $request->c_job,
            'c_jd' => $request->c_jd,
            'c_company' => $request->c_company,
            'education' => $request->education,
            'technical' => $request->technical,
            'history' => $request->history,
            'author' => $request->author,
            'status' => $request->status,
            'regNumber' => $request->regNumber,
            'eduLevel' => $request->eduLevel,
            'image' => $image,
            'cl' => $cl,
            'ot' => $ot,
            'cv' => $cv
        ]);

        session()->flash('success', 'Applicant Created Successfully!!!');

        return redirect(route('applicant.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = Applicant::where('id', $id)->firstOrFail();
        return view('admin.applicants.single')->with('applicant', $applicant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $applicant = Applicant::where('id', $id)->firstOrFail();
        return view('admin.applicants.create')->with('applicant', $applicant);
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
        $applicant = Applicant::where('id', $id)->firstOrFail();
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->image->store('applicants');
            Storage::delete($applicant->image);
            $data['image'] = $image;
        }

        if ($request->hasFile('cv')) {
            $cv = $request->cv->store('applicants');
            Storage::delete($applicant->cv);
            $data['cv'] = $cv;
        }

        if ($request->hasFile('cl')) {
            $cl = $request->cl->store('applicants');
            Storage::delete($applicant->cl);
            $data['cl'] = $cl;
        }

        if ($request->hasFile('ot')) {
            $ot = $request->ot->store('applicants');
            Storage::delete($applicant->ot);
            $data['ot'] = $ot;
        }

        $applicant->update($data);

        session()->flash('success', 'Applicant Updated Successfully!!!');

        return view('admin.applicants.single')->with('applicant', $applicant);
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

    public function makeCategory($id)
    {
        $applicant = Applicant::where('id', $id)->firstOrFail();
        return view('admin.applicants.category')->with('applicant', $applicant)->with('categories', Category::orderBy('updated_at', 'desc')->get());
    }
    public function setCategory(Request $request, $id)
    {
        $applicant = Applicant::where('id', $id)->firstOrFail();
        $data = $request->all();
        $applicant->category_id = $data['category_id'];
        $applicant->save();

        return view('admin.applicants.title')->with('applicant', $applicant)->with('titles', Title::where('category_id', $data['category_id'])->get());
    }

    public function makeTitle(Request $request, $id)
    {
        $applicant = Applicant::where('id', $id)->firstOrFail();
        $data = $request->all();
        $applicant->title_id = $data['title_id'];
        $applicant->save();

        return view('admin.applicants.single')->with('applicant', $applicant);
    }
}
