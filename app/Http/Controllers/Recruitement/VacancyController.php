<?php

namespace App\Http\Controllers\Recruitement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vacancy;
use App\Category;
use App\Title;
use App\Company;

class VacancyController extends Controller
{
    public function index()
    {
        return view('admin.vacancies.index')->with('vacancies', Vacancy::orderBy('updated_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vacancies.create')->with('categories', Category::orderBy('updated_at', 'desc')->get());
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
        $vacancy = Vacancy::create($input);
        return view('admin.vacancies.title')->with('vacancy', $vacancy)->with('titles', Title::where('category_id', $input['category_id'])->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('admin.vacancies.single')->with('vacancy', $vacancy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('admin.vacancies.description')->with('vacancy', $vacancy)->with('categories', Category::orderBy('updated_at', 'desc')->get())->with('titles', Title::orderBy('updated_at', 'desc')->get())->with('companies', Company::orderBy('updated_at', 'desc')->get());
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
        $vacancy = Vacancy::findOrFail($id);
        $data = $request->all();
        $vacancy->update($data);
        session()->flash('success', 'Vacancy Updated Successfully!!!');
        return view('admin.vacancies.single')->with('vacancy', $vacancy);
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

    public function vacancyTitle(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $data = $request->all();
        $vacancy->title_id = $data['title_id'];
        $vacancy->save();
        return view('admin.vacancies.description')->with('vacancy', $vacancy)->with('companies', Company::orderBy('updated_at', 'desc')->get());
    }

    public function vacancyDescription(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $data = $request->all();
        $vacancy->company_id = $data['company_id'];
        $vacancy->number = $data['number'];
        $vacancy->time = $data['time'];
        $vacancy->salary = $data['salary'];
        $vacancy->gender = $data['gender'];
        $vacancy->start = $data['start'];
        $vacancy->end = $data['end'];
        $vacancy->des = $data['des'];
        $vacancy->edu = $data['edu'];
        $vacancy->ben = $data['ben'];
        $vacancy->author = $data['author'];
        $vacancy->save();
        return redirect(route('vacancy.index'));
    }
}
