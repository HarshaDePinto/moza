<?php

namespace App\Http\Controllers\Recruitement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Company;
use App\Category;

class CompanyController extends Controller
{
    public function index()
    {
        return view('admin.companies.index')->with('companies', Company::orderBy('updated_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
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
        Company::create($input);
        session()->flash('success',  'Company Added Successfully!!!');
        return redirect(route('company.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::where('id', $id)->firstOrFail();
        return view('admin.companies.single')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('id', $id)->firstOrFail();
        return view('admin.companies.create')->with('company', $company);
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
        $company = Company::where('id', $id)->firstOrFail();
        $data = $request->all();
        $company->update($data);

        session()->flash('success', 'Company Updated Successfully!!!');

        return view('admin.companies.single')->with('company', $company);
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
        $company = Company::where('id', $id)->firstOrFail();
        return view('admin.companies.category')->with('company', $company)->with('categories', Category::orderBy('updated_at', 'desc')->get());
    }

    public function setCategory(Request $request, $id)
    {
        $company = Company::where('id', $id)->firstOrFail();
        $data = $request->all();

        $company->author = $data['author'];
        $company->categories()->detach($company->categories);
        $company->save();
        if ($request->categories) {
            $company->categories()->attach($request->categories);
        }
        session()->flash('success', 'Set Categories Successfully!!!');
        return view('admin.companies.single')->with('company', $company);
    }
}
