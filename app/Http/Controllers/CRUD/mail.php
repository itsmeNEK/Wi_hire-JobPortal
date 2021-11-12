<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mailing;
use App\Helpers\Helper;
use App\Models\AdminKeepMail;
use App\Models\company;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin;
use App\Models\reportbug;
use Illuminate\Support\Facades\Crypt;

class mail extends Controller
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
    // company send mail candidate
    public function send(Request $request)
    {

        $request->validate([
            'to' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);

        $company = company::where('id', '=', session('Loggedcompany'))->first();
        $mail = new Mailing;
        $mail1 = new AdminKeepMail;

        $mail->from = $company->email;
        $mail->to = $request->to;
        $mail->subject = $request->subject;
        $mail->body = $request->body;
        $save = $mail->save();

        $mail1->from = $company->email;
        $mail1->to = $request->to;
        $mail1->subject = $request->subject;
        $mail1->body = $request->body;
        $save1 = $mail1->save();

        return back()->with('success', 'Message Sent');
    }


    //delete mail
    public function delete(Request $request)
    {
$token = $request->session()->token();

    $token = csrf_token();
        if ($token) {   $delete = DB::table('mailings')
            ->where('id', $request->id)
            ->delete();
        if ($delete) {
            return back()->with('success', 'Mail have been deleted.');
        } else {
            return back()->with('fail', 'Something went wrong, try again later.');
        }

        }
    }




    // admin send candidate mail
    public function a_app_mail(Request $request)
    {

        $request->validate([
            'to' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);

        $company = Admin::where('id', '=', session('adminLogged'))->first();
        $mail = new Mailing;
        $mail1 = new AdminKeepMail;

        $mail->from = $company->email;
        $mail->to = $request->to;
        $mail->subject = $request->subject;
        $mail->body = $request->body;
        $save = $mail->save();

        $mail1->from = $company->email;
        $mail1->to = $request->to;
        $mail1->subject = $request->subject;
        $mail1->body = $request->body;
        $save1 = $mail1->save();

        return back()->with('success', 'Message Sent');
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
            'to' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);


        $mail = new Mailing;
        $mail1 = new AdminKeepMail;
        if ($request->attachfiles != "") {
            $path = 'mail/';
            $request->validate([
                'attachfiles' => 'required|mimes:doc,pdf,docx|max:10000'
            ]);
            $newname = Helper::renameFile($path, $request->file('attachfiles')->getClientOriginalName());
            $upload = $request->attachfiles->move(public_path($path), $newname);
            $mail->attach = $newname;
            $mail1->attach = $newname;
        }

        $mail->from = $request->from;
        $mail->to = $request->to;
        $mail->subject = $request->subject;
        $mail->body = $request->body;
        $save = $mail->save();

        $mail1->from = $request->from;
        $mail1->to = $request->to;
        $mail1->subject = $request->subject;
        $mail1->body = $request->body;
        $save1 = $mail1->save();

        if ($save1 && $save) {
            return back()->with('success', 'Mail Sent.');
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
    public function view($id)
    {
        $id = crypt::decrypt($id);
        $mailinfo = Mailing::where('id', '=', $id)->first();
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $sender = User::where('email', '=', $mailinfo->from)->first();
        $receiver = User::where('email', '=', $mailinfo->to)->first();
        $sender1 = company::where('email', '=', $mailinfo->from)->first();
        $receiver1 = company::where('email', '=', $mailinfo->to)->first();
        $sender2 = Admin::where('email', '=', $mailinfo->from)->first();
        $receiver2 = Admin::where('email', '=', $mailinfo->to)->first();

        $active = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->get();
        //if send seen the message not update active
        if ($user->email != $mailinfo->from) {
            //seen mail
            $seen = DB::table('mailings')
                ->where('id', $id)
                ->update(['mail_active' => '0']);
        }
        if ($sender) {
            $send = $sender;
            if ($receiver) {
                $receive = $receiver;
            } elseif ($receiver1) {
                $receive = $receiver1;
            } else {
                $receive = $receiver2;
            }
        } elseif ($sender1) {
            $send = $sender1;
            if ($receiver) {
                $receive = $receiver;
            } elseif ($receiver1) {
                $receive = $receiver1;
            } else {
                $receive = $receiver2;
            }
        } else {
            $send = $sender2;
            if ($receiver) {
                $receive = $receiver;
            } elseif ($receiver1) {
                $receive = $receiver1;
            } else {
                $receive = $receiver2;
            }
        }

        $data = [
            'LoggedUserInfo' => $user,
            'mailInfo' => $mailinfo,
            'active' => $active,
            'senderInfo' => $send,
            'receiverinfo' => $receive,
            'inbox' => $inbox,

        ];
        return view('users.u_veiw_mail', $data);
    }
    //company view mail
    public function cview($id)
    {
        $id = crypt::decrypt($id);
        $mailinfo = Mailing::where('id', '=', $id)->first();
        $user = company::where('id', '=', session('Loggedcompany'))->first();
        $sender = User::where('email', '=', $mailinfo->from)->first();
        $receiver = User::where('email', '=', $mailinfo->to)->first();
        $sender1 = company::where('email', '=', $mailinfo->from)->first();
        $receiver1 = company::where('email', '=', $mailinfo->to)->first();
        $sender2 = Admin::where('email', '=', $mailinfo->from)->first();
        $receiver2 = Admin::where('email', '=', $mailinfo->to)->first();
        $active = Mailing::where('to', '=', $user->email)->count();

        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->get();
        $inbox = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->get();

        //if send seen the message not update active
        if ($user->email != $mailinfo->from) {
            //seen mail
            $seen = DB::table('mailings')
                ->where('id', $id)
                ->update(['mail_active' => '0']);
        }

        if ($sender) {
            $send = $sender;
            if ($receiver) {
                $receive = $receiver;
            } elseif ($receiver1) {
                $receive = $receiver1;
            } else {
                $receive = $receiver2;
            }
        } elseif ($sender1) {
            $send = $sender1;
            if ($receiver) {
                $receive = $receiver;
            } elseif ($receiver1) {
                $receive = $receiver1;
            } else {
                $receive = $receiver2;
            }
        } else {
            $send = $sender2;
            if ($receiver) {
                $receive = $receiver;
            } elseif ($receiver1) {
                $receive = $receiver1;
            } else {
                $receive = $receiver2;
            }
        }


        $data = [
            'LoggedUserInfo' => $user,
            'mailInfo' => $mailinfo,
            'active' => $active,
            'senderInfo' => $send,
            'receiverinfo' => $receive,
            'inbox' => $inbox,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
        ];

        return view('company.c_veiw_mail', $data);
    }

    //admin view mail
    public function aview($id)
    {
        $id = crypt::decrypt($id);
        $mailinfo = Mailing::where('id', '=', $id)->first();
        $user = Admin::where('id', '=', session('adminLogged'))->first();
        $sender = User::where('email', '=', $mailinfo->from)->first();
        $receiver = User::where('email', '=', $mailinfo->to)->first();
        $sender1 = company::where('email', '=', $mailinfo->from)->first();
        $receiver1 = company::where('email', '=', $mailinfo->to)->first();
        $sender2 = Admin::where('email', '=', $mailinfo->from)->first();
        $receiver2 = Admin::where('email', '=', $mailinfo->to)->first();
        $active = Mailing::where('to', '=', $user->email)->count();

        $inbox = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->get();
        //if send seen the message not update active
        if ($user->email != $mailinfo->from) {
            //seen mail
            $seen = DB::table('mailings')
                ->where('id', $id)
                ->update(['mail_active' => '0']);
        }

        if ($sender) {
            $send = null;
            if ($receiver) {
                $receive = $receiver;
            } elseif ($receiver1) {
                $receive = $receiver1;
            } elseif ($receiver2) {
                $receive = $receiver2;
            }else{
                $receive = null;
            }
        } elseif ($sender1) {
            $send = null;
            if ($receiver) {
                $receive = $receiver;
            } elseif ($receiver1) {
                $receive = $receiver1;
            } elseif ($receiver2) {
                $receive = $receiver2;
            }else{
                $receive = null;
            }
        } elseif ($sender2) {
            $send = null;
            if ($receiver) {
                $receive = $receiver;
            } elseif ($receiver1) {
                $receive = $receiver1;
            } elseif ($receiver2) {
                $receive = $receiver2;
            }else{
                $receive = null;
            }
        }else{
            $send = null;
            if ($receiver) {
                $receive = $receiver;
            } elseif ($receiver1) {
                $receive = $receiver1;
            } elseif ($receiver2) {
                $receive = $receiver2;
            }else{
                $receive = null;
            }
        }


        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->get();
        $data = [
            'LoggedUserInfo' => $user,
            'mailInfo' => $mailinfo,
            'active' => $active,
            'senderInfo' => $send,
            'receiverinfo' => $receive,
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'inbox' => $inbox,
            'comcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,
        ];
        return view('admin.a_veiw_mail', $data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reply($id)
    {
        $id = crypt::decrypt($id);
        $mailinfo = Mailing::where('id', '=', $id)->first();
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $sender = User::where('email', '=', $mailinfo->from)->first();
        $receiver = User::where('email', '=', $mailinfo->to)->first();


        $active = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->get();

        if ($sender) {
            if ($user->email == $mailinfo->from || $mailinfo->to) {
                $receiver = company::where('email', '=', $mailinfo->to)->first();
                $data = [
                    'LoggedUserInfo' => $user,
                    'mailInfo' => $mailinfo,
                    'senderInfo' => $sender,
                    'active' => $active,
                    'inbox' => $inbox,

                    'receiverinfo' => $receiver,
                ];

                return view('users.u_reply_mail', $data);
            }
        } else
        if ($receiver) {
            if ($user->email == $mailinfo->from || $mailinfo->to) {
                $sender = company::where('email', '=', $mailinfo->from)->first();
                $data = [
                    'LoggedUserInfo' => $user,
                    'mailInfo' => $mailinfo,
                    'senderInfo' => $sender,
                    'receiverinfo' => $receiver,
                    'active' => $active,
                    'inbox' => $inbox,
                ];
                return view('users.u_reply_mail', $data);
            }
        }
    }
    // company reply
    public function creply($id)
    {
        $id = crypt::decrypt($id);
        $mailinfo = Mailing::where('id', '=', $id)->first();
        $user = company::where('id', '=', session('Loggedcompany'))->first();
        $active = Mailing::where('to', '=', $user->email)->count();

        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->get();
        $inbox = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->get();
        $data = [
            'LoggedUserInfo' => $user,
            'mailInfo' => $mailinfo,
            'active' => $active,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
            'inbox' => $inbox,

        ];
        return view('company.c_reply_mail', $data);
    }
    // admin reply
    public function areply($id)
    {
        $id = crypt::decrypt($id);
        $mailinfo = Mailing::where('id', '=', $id)->first();
        $user = Admin::where('id', '=', session('adminLogged'))->first();
        $active = Mailing::where('to', '=', $user->email)->count();

        $inbox = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->get();
            $reportcount = reportbug::where('active', '=', '1')
                ->count();
            $reportcount_info = reportbug::where('active', '=', '1')
                ->get();
        $data = [
            'LoggedUserInfo' => $user,
            'mailInfo' => $mailinfo,
            'active' => $active,
            'inbox' => $inbox,
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'comcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,
        ];

        return view('admin.a_reply_mail', $data);
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
    }
}
