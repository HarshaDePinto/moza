<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


//FrontEnd New Zealand
Route::get('/NewZealand', 'MozaController@newZealand')->name('newZealand');
Route::get('/NewZealand/Visa', 'MozaController@newZealandVisa')->name('newZealandVisa');

Route::get('/NewZealand/Visa/Student', 'MozaController@newZealandVisaStudent')->name('newZealandVisaStudent');

Route::middleware(['auth'])->group(function () {

    Route::get('/admin', 'HomeController@admin')->name('admin');
    Route::get('/adminStudent', 'HomeController@adminStudent')->name('adminStudent');
    Route::get('/student', 'HomeController@student')->name('student');
    Route::get('/employer', 'HomeController@employer')->name('employer');

    Route::resource('applicant', 'Recruitement\ApplicantController');
    Route::get('applicant/{applicant}/makeCategory', 'Recruitement\ApplicantController@makeCategory')->name('makeCategory');
    Route::post('applicant/{applicant}/setCategory', 'Recruitement\ApplicantController@setCategory')->name('setCategory');
    Route::post('applicant/{applicant}/makeTitle', 'Recruitement\ApplicantController@makeTitle')->name('makeTitle');

    Route::resource('category', 'Recruitement\CategoryController');

    Route::resource('company', 'Recruitement\CompanyController');
    Route::get('company/{company}/makeCategory', 'Recruitement\CompanyController@makeCategory')->name('makeCCategory');
    Route::post('company/{company}/setCategory', 'Recruitement\CompanyController@setCategory')->name('setCCategory');

    Route::resource('title', 'Recruitement\TitleController');

    Route::resource('user', 'Admin\AdminUserController');
    Route::get('users/{user}/changePassword', 'Admin\AdminUserController@changePassword')->name('user.changePassword');
    Route::put('users/{user}/login', 'Admin\AdminUserController@login')->name('user.login');

    Route::resource('vacancy', 'Recruitement\VacancyController');
    Route::post('vacancy/{vacancy}/vacancyTitle', 'Recruitement\VacancyController@vacancyTitle')->name('vacancyTitle');
    Route::post('vacancy/{vacancy}/vacancyDescription', 'Recruitement\VacancyController@vacancyDescription')->name('vacancyDescription');

    Route::post('applicant/apCategory', 'Recruitement\SearchController@apCategory')->name('apCategory');
    Route::post('applicant/apTitle', 'Recruitement\SearchController@apTitle')->name('apTitle');

    Route::post('applicant/apRef', 'Recruitement\SearchController@apRef')->name('apRef');

    Route::post('company/cpName', 'Recruitement\SearchController@cpName')->name('cpName');


    Route::resource('interview', 'Recruitement\InterviewController');

    Route::get('applicant/{applicant}/interview', 'Recruitement\InterviewController@applicant')->name('app.interview');

    Route::get('applicant/{applicant}/mail', 'Recruitement\EmailController@create')->name('mail.create');

    Route::post('applicant/sendMail', 'Recruitement\EmailController@send')->name('mail.send');


    Route::resource('hire', 'HireController');
    Route::get('applicant/{applicant}/hired', 'Recruitement\HireController@applicant')->name('app.hire');

    Route::resource('reject', 'Recruitement\RejectController');
    Route::get('applicant/{applicant}/rejected', 'Recruitement\RejectController@applicant')->name('app.reject');
});

Route::resource('subscribe', 'Admin\SubscribeController');
Route::resource('reg', 'Visa\RegController');
Route::resource('stuLev', 'StuAd\LevelController');
Route::get('level/{level}/addSub', 'StuAd\SubjectController@addSub')->name('addSub');
Route::resource('stuSub', 'StuAd\SubjectController');

Route::post('student/Level', 'Recruitement\SearchController@stLevName')->name('stLevName');

Route::post('student/Subject/search', 'Recruitement\SearchController@stSubName')->name('stSubName');
