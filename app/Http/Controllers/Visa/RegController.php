<?php

namespace App\Http\Controllers\Visa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\User;

class RegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => 2,
            'is_active' => 0,
            'author' => 'Online',
            'password' => Hash::make('Student@2020'),
        ]);

        $to_email = $data['email'];
        $subject = 'Study In New Zealand-With Mozita';
        $data = array('name' => $data['name'], 'title' => $data['title'], 'level' => $data['level']);
        Mail::send('admin.emails.regStu', $data, function ($message) use ($to_email, $subject) {
            $message->to($to_email)->subject($subject);
            $message->from('harsha@designerdepinto.com', 'Mozita Visa Services');
        });
        $send = $request->all();
        $send_email = 'designerdepinto@gmail.com';
        $subject = 'Student Register';
        $data_send = array('name' => $send['name'], 'title' => $send['title'], 'level' => $send['level'], 'age' => $send['age'], 'country' => $send['myCountry']);
        Mail::send('admin.emails.regStuAd', $data_send, function ($message) use ($send_email, $subject) {
            $message->to($send_email)->subject($subject);
            $message->from('harsha@designerdepinto.com', 'Mozita Control Panel');
        });
        session()->flash('success', 'Registered Successfully Check Your inbox!');
        return redirect()->back();
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
