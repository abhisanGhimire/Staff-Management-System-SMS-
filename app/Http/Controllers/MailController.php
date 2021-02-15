<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Department;

use App\Mail\SendMail;

class MailController extends Controller
{
    public function create()
    {
        return view('admin.mail.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'mimes:docx,doc,pdf,jpeg,jpg,png',
            'body' => 'required'
        ]);
        $image = $request->file('file');
        $details = [
            'body' => $request->body,
            'file' => $image
        ];
        if ($request->department) {
            $users = User::where('department_id', $request->department)->get();
            foreach ($users as $user) {
                \Mail::to($user->email)
                    ->send(new SendMail($details));
            }
        } elseif ($request->person) {
            $user = User::where('id', $request->person)->first();
            $userEmail = $user->email;
            \Mail::to($user->email)
                ->send(new SendMail($details));
        } else {
            $users = User::get();
            foreach ($users as $user) {
                \Mail::to($user->email)
                    ->send(new SendMail($details));
            }
        }
        return redirect()->back()->with('message', "Mail sent successfully");
    }
}
