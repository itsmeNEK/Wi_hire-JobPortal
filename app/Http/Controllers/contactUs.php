<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mailing;
use App\Models\contactUss;
use App\Models\User;
use App\Models\company;
use App\Helpers\Helper;
use App\Models\reportbug;

class contactUs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'body' => 'required',
        ]);

        $exist = User::where('email', '=', $request->email)->first();
        $exist1 = Company::where('email', '=', $request->email)->first();

        $save = new contactUss();
        $save->name = $request->name;
        $save->from = $request->email;
        $save->subject = $request->subject;
        $save->body = $request->body;
        $save->save();

        $mail = new Mailing;

        $mail->from = $request->email;
        $mail->to = 'admin@admin.admin';
        $mail->subject = $request->subject;
        $mail->body = $request->body;
        $save = $mail->save();

        if (($exist == null) ||  ($exist1 == null)) {
            return back()->with('success', 'We receive your mail but we cannot reply. Create Account First!');
        } else {
            return back()->with('success', 'Mail Successfully Sent');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Report_save(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'body' => 'required',
        ]);


        $mail = new reportbug;
        if ($request->attachfiles != "") {
            $path = 'reportbug/';
            $newname = Helper::renameFile($path, $request->file('attachfiles')->getClientOriginalName());
            $upload = $request->attachfiles->move(public_path($path), $newname);
            $mail->attach = $newname;
        }
        $mail->subject = $request->subject;
        $mail->body = $request->body;
        $save = $mail->save();

        if ($save) {
            return back()->with('success', 'Report Sent.');
        } else {
            return back()->with('fail', 'Mail did not send.Something went wrong.');
        }
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
