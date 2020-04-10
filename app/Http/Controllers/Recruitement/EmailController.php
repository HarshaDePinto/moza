<?php

namespace App\Http\Controllers\Recruitement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Applicant;
use App\EMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function create($id)
    {
        $applicant = Applicant::where('id', $id)->firstOrFail();
        return view('admin.emails.create')->with('applicant', $applicant);
    }

    public function send(Request $request)
    {
        $input = $request->all();
        $to_name = $input['name'];
        $to_email = $input['email'];
        $subject = $input['subject'];
        $author = $input['author'];
        $data = array('name' => $input['name'], 'body' => $input['body']);
        Mail::send('admin.emails.mail', $data, function ($message) use ($to_name, $to_email, $subject, $author) {
            $message->to($to_email, $to_name)->subject($subject);
            $message->from('harsha@designerdepinto.com', $author);
        });
        $email = EMail::create($input);
        $applicant = Applicant::where('id', $email->applicant_id)->firstOrFail();
        $applicant->status = 'Contacted';
        $applicant->sn = 1;
        $applicant->save();
        session()->flash('success',  'Mail Send Successfully!!!');
        return redirect(route('applicant.index'));
    }
}
