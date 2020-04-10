<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MozaController extends Controller
{
    public function newZealand()
    {
        return view('newZealand.welcome');
    }

    public function newZealandVisa()
    {
        return view('newZealand.visa.index');
    }

    public function newZealandVisaStudent()
    {
        return view('newZealand.visa.student');
    }
}
