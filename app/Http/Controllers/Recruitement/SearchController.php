<?php

namespace App\Http\Controllers\Recruitement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Company;
use App\Applicant;
use App\Title;
use App\Student\Level;

class SearchController extends Controller
{
    public function apCategory(Request $request)
    {
        $data = $request->all();

        $category = Category::where('id', $data['category_id'])->firstOrFail();
        return view('admin.applicants.apCategory')->with('applicants', Applicant::where('category_id', $data['category_id'])->get())->with('categoryName', $category)->with('categories', Category::orderBy('updated_at', 'desc')->get());
    }

    public function apTitle(Request $request)
    {
        $data = $request->all();

        $title = Title::where('id', $data['title_id'])->firstOrFail();
        return view('admin.applicants.apTitle')->with('applicants', Applicant::where('title_id', $data['title_id'])->get())->with('titleName', $title)->with('categories', Category::orderBy('updated_at', 'desc')->get());
    }

    public function apRef(Request $request)
    {
        $data = $request->all();

        $applicants = Applicant::where('regNumber', 'LIKE', '%' . $data['regNumber'] . '%')->get();
        return view('admin.applicants.apRef')->with('applicants', $applicants)->with('categories', Category::orderBy('updated_at', 'desc')->get());
    }

    public function cpName(Request $request)
    {
        $data = $request->all();

        $companies = Company::where('name', 'LIKE', '%' . $data['name'] . '%')->get();
        return view('admin.companies.index')->with('companies', $companies);
    }

    public function stLevName(Request $request)
    {
        $data = $request->all();

        $levels = Level::where('name', 'LIKE', '%' . $data['name'] . '%')->get();
        return view('students.admin.levels.index')->with('levels', $levels);
    }
    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {

            $data = Level::where('name', 'LIKE', '%' . $request->name . '%')
                ->get();

            $output = '';

            if (count($data) > 0) {

                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';

                foreach ($data as $row) {

                    $output .= '<li class="list-group-item">' . $row->name . '</li>';
                }

                $output .= '</ul>';
            } else {

                $output .= '<li class="list-group-item">' . 'No results' . '</li>';
            }

            return $output;
        }
    }
}
