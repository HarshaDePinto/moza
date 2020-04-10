<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subscribe;
use App\EMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SubscribeRequest;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.admin.subscribes.index')->with('subscribes', Subscribe::orderBy('updated_at', 'desc')->get());
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
    public function store(SubscribeRequest $request)
    {
        $validated = $request->validated();
        Subscribe::create([
            'type' => $validated['type'],
            'email' => $validated['email']
        ]);

        $input = $request->all();
        $to_email = $input['email'];
        $subject = 'Study In New Zealand-With Mozita';
        $data = array('name' => 'Student', 'body' => 'Thank You!');
        Mail::send('admin.emails.student', $data, function ($message) use ($to_email, $subject) {
            $message->to($to_email)->subject($subject);
            $message->from('harsha@designerdepinto.com', 'Mozita Visa Services');
        });
        session()->flash('success', 'Subscribed Successfully Check Your inbox!');
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
