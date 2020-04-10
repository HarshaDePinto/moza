<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Company;
use App\Title;
use App\Vacancy;
use App\Applicant;
use App\Interview;
use App\EMail;
use App\User;
use App\Subscribe;
use App\Student\Level;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        return view('admin.home')->with('categories', Category::orderBy('updated_at', 'desc')->get())->with('titles', Title::orderBy('updated_at', 'desc')->get())->with('companies', Company::orderBy('updated_at', 'desc')->get())->with('vacancies', Vacancy::orderBy('updated_at', 'desc')->get())->with('applicants', Applicant::orderBy('updated_at', 'desc')->get())->with('interviews', Interview::orderBy('updated_at', 'desc')->get())->with('mails', EMail::orderBy('updated_at', 'desc')->get())->with('users', User::orderBy('updated_at', 'desc')->get());
    }

    public function adminStudent()
    {
        return view('students.admin.home')->with('subscribes', Subscribe::where('type', 'Student')->get())->with('levels', Level::orderBy('updated_at', 'desc')->get())->with('titles', Title::orderBy('updated_at', 'desc')->get())->with('companies', Company::orderBy('updated_at', 'desc')->get())->with('vacancies', Vacancy::orderBy('updated_at', 'desc')->get())->with('applicants', Applicant::orderBy('updated_at', 'desc')->get())->with('interviews', Interview::orderBy('updated_at', 'desc')->get())->with('mails', EMail::orderBy('updated_at', 'desc')->get())->with('users', User::orderBy('updated_at', 'desc')->get());
    }

    public function student()
    {
        return view('students.home');
    }
}
