<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\verificationEmail;
use App\Models\Mailing;

class userController extends Controller
{

    //login controller
    public function u_login()
    {
        $path = url()->previous();
        if ($path == "http://127.0.0.1:8000/Jobs") {
            return view('u_login')->with('fail', 'You Must Login');
        } else {
            return view('u_login');
        }
    }

    //verification page

    public function u_verificationpage($id)
    {
        $email1 = Crypt::decrypt($id);
        $userInfo = User::where('id', '=', $email1)->first();
        $email_Data = [
            'fname' => $userInfo->fname,
            'email' => $userInfo->email,
            'id'    => $userInfo->id
        ];

        $data = ['user_info' => $email_Data];

        return view('u_verification', $data);
    }
    // forgot password page
    public function u_forgot()
    {
        return view('forgotpassword');
    }

    //reset password
    public function u_reset(Request $request)
    {

        $user_info = User::where('email', '=', $request->email)->first();
        $code = str::Random(10);
        $email_Data = [
            'code' => $code,
            'fname' => $user_info->fname,
            'email' => $user_info->email,
        ];

        // inserting new CODE to VERIFY
        $update = DB::table('verify_users')
            ->where('user_id', $user_info->id)
            ->update([
                'code' => $code,
            ]);

        Mail::to($user_info->email)->send(new verificationEmail($email_Data));

        $id = Crypt::encrypt($user_info->id);

        return redirect(route('u_verifyforget', $id));
    }

    //user dashboard
    public function u_dash()
    {
        $usedID = session('LoggedUser');
        $EB = DB::table('user_prof_e_b_s')
            ->where('user_id', $usedID)
            ->get();
        $WE = DB::table('user_prof_work_exes')
            ->where('user_id', $usedID)
            ->get();
        $skills = DB::table('user_prof_skills')
            ->where('user_id', $usedID)
            ->get();
        $files = DB::table('user_file_uploads')
            ->where('user_id', $usedID)
            ->get();
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'active' => $mailinfo,
            'inbox' => $inbox,
            'user_SkilssInfo' => $skills,
            'user_educbackInfo' => $EB,
            'user_workexInfo' => $WE,
            'user_files' => $files,
            'LoggedUserInfo' => $user
        ];
        return view('users.u_dashboard', $data);
    }

    //sign up controller
    public function u_signup()
    {
        return view('u_signup');
    }

    //add EB
    public function u_addEB()
    {
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'active' => $mailinfo,
            'inbox' => $inbox,

            'LoggedUserInfo' => $user
        ];
        return view('users.u_editEB', $data);
    }

    //editEB
    public function u_editEB($id)
    {
        $id = crypt::decrypt($id);
        $EB = DB::table('user_prof_e_b_s')
            ->where('id', $id)
            ->first();
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
            'info' => $EB,
            'active' => $mailinfo,
            'inbox' => $inbox,

        ];
        return view('users.u_updateEB', $data);
    }
    //edit skills
    public function u_editskills($id)
    {
        $id = crypt::decrypt($id);
        $EB = DB::table('user_prof_skills')
            ->where('id', $id)
            ->first();
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
            'info1' => $EB,
            'active' => $mailinfo,
            'inbox' => $inbox,
        ];
        return view('users.u_updateSkills', $data);
    }

    //add skills
    public function u_updateSkills()
    {
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'active' => $mailinfo,
            'inbox' => $inbox,
            'LoggedUserInfo' => $user
        ];
        return view('users.u_editSkills', $data);
    }
    //add We
    public function u_updateWE()
    {
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'inbox' => $inbox,

        ];
        return view('users.u_editWE', $data);
    }
    //edit We
    public function u_editWE($id)
    {
        $id = crypt::decrypt($id);
        $WE = DB::table('user_prof_work_exes')
            ->where('id', $id)
            ->first();
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
            'info1' => $WE,
            'active' => $mailinfo,
            'inbox' => $inbox,
        ];
        return view('users.u_updateWE', $data);
    }
    //update userprofile
    public function u_update()
    {
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'active' => $mailinfo,
            'inbox' => $inbox,
            'LoggedUserInfo' => $user
        ];
        return view('users.u_editProfile', $data);
    }
    //user application
    public function u_app()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('users.u_application', $data);
    }
    //user mailbox sent
    public function u_mail()
    {
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $email = $user->email;

        $sent = DB::table('mailings')
        ->leftjoin('users', 'mailings.to', '=', 'users.email')
        ->leftjoin('companies', 'mailings.to', '=', 'companies.email')
        ->where('from', $user->email)
        ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from', 'mailings.to')
        ->orderBy('created_at', 'desc')
        ->paginate(20);
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'sent_info' => $sent,
            'active' => $mailinfo,
            'inbox' => $inbox,
            'LoggedUserInfo' => user::where('id', '=', session('LoggedUser'))->first()
        ];
        return view('users.u_mailbox', $data);
    }

    //user mailbox inbox
    public function u_mail_inbox()
    {
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $email = $user->email;

        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from', 'mailings.to')
            ->where('to', $user->email)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox1 = DB::table('mailings')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [
            'mail_info' => $inbox,
            'active' => $mailinfo,
            'inbox' => $inbox1,
            'LoggedUserInfo' => $user
        ];
        return view('users.u_inbox', $data);
    }

    //user mailbox create
    public function u_mail_create()
    {
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'active' => $mailinfo,
            'inbox' => $inbox,

            'LoggedUserInfo' => $user,
        ];
        return view('users.u_create', $data);
    }

    //user settings
    public function u_settings()
    {
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'inbox' => $inbox,

        ];
        return view('users.u_settings', $data);
    }
}
