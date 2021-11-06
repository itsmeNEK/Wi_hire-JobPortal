<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\company;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Helpers\Helper;
use App\Models\VerifyCompany;
use App\Models\Mailing;
use App\Mail\c_verificationEmail;
use App\Models\Admin;
use App\Models\jobs;
use App\Models\companyfiles;
use App\Models\applicants;

class companyController extends Controller
{
    // forgot password page company
    public function c_forgot()
    {
        return view('c_forgotpassword');
    }
    //change password
    public function c_cp(Request $request)
    {
        $request->validate([
            'currentpass' => 'required|min:6',
            'newpass' => 'required|min:6',
            'cpass' => 'required|min:6',
        ]);

        $user = company::find($request->id);

        if ($user) {
            if (Hash::check($request->currentpass, $user->password)) {
                if ($request->newpass = $request->cpass) {

                    $date = Carbon::now();
                    //Get date and time
                    $date->toDateTimeString();

                    $user->password = Hash::make($request->newpass);
                    $user->updated_at = $date;
                    $save = $user->save();
                    if ($save) {
                        return back()->with('success', 'Password Successfully Changed!');
                    }
                } else {
                    return back()->with('fail', 'Password do not Match!');
                }
            } else {
                return back()->with('fail', 'Incorrect current password!');
            }
        }
    }

    //update company profile
    public function c_updateI(Request $request)
    {
        $request->validate([
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $date = Carbon::now();
        //Get date and time
        $date->toDateTimeString();

        $user = company::find($request->id);

        if (empty($request->avatar)) {
        } else {
            $path = 'company/images/';
            $newname = Helper::renameFile($path, $request->file('avatar')->getClientOriginalName());
            $upload = $request->avatar->move(public_path($path),  $newname);
            $user->prof_pic = $newname;

            $update = jobs::where('c_id', '=', $user->id)
                ->update(['prof_pic' => $newname]);
        }

        $user->cname = $request->cname;
        $user->cpname = $request->cpname;
        $user->cdescription = $request->cdescription;
        $user->province = $request->province;
        $user->city = $request->city;
        $user->street = $request->street;
        $user->barangay = $request->barangay;
        $user->HBnum = $request->HBnum;
        $user->postcode = $request->postcode;
        $user->updated_at = $date;
        $user->save();
        if ($user) {
            return back()->with('success', 'Update Successfull');
        } else {
            return back()->with('fail', 'Something went wrong, try again later.');
        }
    }
    //user logout
    public function c_logout()
    {
        //if session is in use
        if (session()->has('Loggedcompany')) {
            //user pull and reutrn home page
            session()->pull('Loggedcompany');
            return redirect('home');
        }
    }

    public function c_check(Request $request)
    {
        //validate request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $userInfo = company::where('email', '=', $request->email)->first();
        if (!$userInfo) {
            return back()->with('fail', 'We do not recognize your email address!');
        } else {
            //check password
            if (Hash::check($request->password, $userInfo->password)) {
                if ($userInfo->email_verified_at == "") {
                    $data = Crypt::encrypt($userInfo->id);
                    return redirect(route('c_verify', $data));
                } elseif ($userInfo->approved == 2) {
                    return back()->with('fail', 'You have been blocked by the Administrator.For more Info visit our how to use page or mail us');
                } else {
                    $request->session()->put('Loggedcompany', $userInfo->id);
                    return redirect()->route('c_dash');
                }
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }
    }



    //company check code
    public function c_checkcode(Request $request)
    {
        //validate request
        $request->validate([
            'code' => 'required',
        ]);
        $userInfo = company::where('email', '=', $request->email)->first();
        $verify_info = VerifyCompany::where('comany_email', '=', $request->email)->first();

        if ($verify_info->code == $request->code) {
            $date = Carbon::now();
            //Get date and time
            $date->toDateTimeString();

            $userInfo->email_verified_at = $date;
            $save = $userInfo->save();
            if ($save) {
                $request->session()->put('Loggedcompany', $userInfo->id);
                return redirect('company_dashboard');
            } else {
                return back()->with('fail', 'Something went wrong!');
            }
        } else {
            return back()->with('fail', 'Wrong code inputed!');
        }
    }
    //delete job
    public function delete(Request $request)
    {

        $user = jobs::find($request->id);
        $user->stat = '0';
        $user->save();
        if ($user) {
            return redirect(route('c_manage'))->with('success', 'Job successfully deleted.');
        } else {
            return back()->with('fail', 'Something went wrong, try again later.');
        }
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
    public function c_save(Request $request)
    {
        //validate request

        $request->validate([
            'cname' => 'required',
            'CPname' => 'required',
            'email' => 'required|email|unique:companies|unique:users',
            'password' => 'required|min:6',
            'cpassword' => 'required|min:6'
        ]);
        $pass1 = $request->password;
        $pass2 = $request->cpassword;

        if ($pass1 == $pass2) {
            /** Make avata */
            $path = 'company/images/';
            $fontPath = public_path('fonts/Oliciy.ttf');
            $newchar = strtoupper($request->cname[0]);
            $newAvatarName = rand(12, 34353) . time() . '_avatar.png';
            $dest = $path . $newAvatarName;

            $createAvatar = makeAvatar($fontPath, $dest, $newchar);
            $picture = $createAvatar == true ? $newAvatarName : '';

            //insert data to database
            $user = new company;
            $user->cname = $request->cname;
            $user->cpname = $request->CPname;
            $user->email = $request->email;
            $user->prof_pic = $picture;
            $user->password = Hash::make($request->password);
            $save = $user->save();

            $companyInfo = company::where('email', '=', $request->email)->first();
            $company_id = $companyInfo->id;
            $code = str::Random(10);

            // inserting CODE and company id in VERIFY
            $verifyEmail = new VerifyCompany;
            $verifyEmail->code = $code;
            $verifyEmail->comany_email = $request->email;
            $verifyEmail->comany_id = $company_id;
            $save = $verifyEmail->save();


            // sending verification code through mail
            $email_Data = [
                'code' => $code,
                'fname' => $request->cpname,
                'email' => $request->email,
            ];
            Mail::to($user->email)->send(new c_verificationEmail($email_Data));
            $data = Crypt::encrypt($company_id);
            if ($save) {
                return redirect(route('c_verify', $data));
            } else {
                return back()->with('fail', 'Something went wrong, try again later.');
            }
        } else {
            return back()->with('fail', 'Password do not match.');
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

    //rezet password
    public function c_reset(Request $request)
    {

        $user_info = company::where('email', '=', $request->email)->first();
        $code = str::Random(10);
        $email_Data = [
            'code' => $code,
            'fname' => $user_info->cname,
            'email' => $user_info->email,
        ];

        // inserting new CODE to VERIFY
        $update = DB::table('verify_companies')
            ->where('comany_id', $user_info->id)
            ->update([
                'code' => $code,
            ]);

        Mail::to($user_info->email)->send(new c_verificationEmail($email_Data));

        $id = Crypt::encrypt($user_info->id);

        return redirect(route('c_verifyforget', $id));
    }

    //verification page company

    public function c_verificationpage($id)
    {

        $email1 = Crypt::decrypt($id);
        $userInfo = company::where('id', '=', $email1)->first();
        $email_Data = [
            'fname' => $userInfo->cpname,
            'email' => $userInfo->email,
            'id'    => $userInfo->id
        ];


        $data = ['user_info' => $email_Data];

        return view('c_verification', $data);
    }

    //verification page forget

    public function c_verificationpageforget($id)
    {

        $email1 = Crypt::decrypt($id);
        $userInfo = company::where('id', '=', $email1)->first();
        $email_Data = [
            'fname' => $userInfo->cpname,
            'email' => $userInfo->email,
            'id' => $userInfo->id
        ];
        $data = ['user_info' => $email_Data];

        return view('c_verification_forgot', $data);
    }
    //company login
    public function c_login()
    {
        if (session()->has('Loggedcompany')) {
            //user pull and reutrn home page
            session()->pull('Loggedcompany');
            return view('c_login');
        } else {
            session()->pull('Loggedcompany');
            return view('c_login');
        }
    }

    //company dashboard
    public function c_dash()
    {
        $jobcount = DB::table('jobs')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '1')
            ->count();
        $appcount = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->count();
        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $app = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $job = DB::table('jobs')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $user = company::where('id', '=', session('Loggedcompany'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'active' => $mailinfo,
            'inbox' => $inbox,
            'LoggedUserInfo' => $user,
            'jobcount' => $jobcount,
            'appcount' => $appcount,
            'appinfo' => $app,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
            'jobinfo' => $job,
        ];
        return view('company.c_dashboard', $data);
    }
    // company manage job
    function c_manage()
    {

        $job = DB::table('jobs')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $user = company::where('id', '=', session('Loggedcompany'))->first();

        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();

        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $data = [
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'jobinfo' => $job,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
            'inbox' => $inbox,

        ];

        return view('company.c_managejobs', $data);
    }
    // company manage app new
    function c_appManage()
    {

        $app = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $user = company::where('id', '=', session('Loggedcompany'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)->count();

        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'jobinfo' => $app,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
            'inbox' => $inbox,
        ];

        return view('company.c_manageApp', $data);
    }
    // company manage app rej
    function c_appManageRej()
    {

        $app = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '2')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $user = company::where('id', '=', session('Loggedcompany'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'jobinfo' => $app,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
            'inbox' => $inbox,


        ];

        return view('company.c_manageAppReject', $data);
    }
    // company manage app viewed
    function c_appManageViewed()
    {

        $app = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $user = company::where('id', '=', session('Loggedcompany'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'jobinfo' => $app,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
            'inbox' => $inbox,


        ];

        return view('company.c_manageAppViewed', $data);
    }

    //company Create job
    public function c_createjob()
    {
        $user = company::where('id', '=', session('Loggedcompany'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();

        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();


        $data = [
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
            'inbox' => $inbox,


        ];
        return view('company.c_createJobs', $data);
    }

    //update company
    public function c_update()
    {
        $user = company::where('id', '=', session('Loggedcompany'))->first();
        $files = companyfiles::where('company_id', '=', session('Loggedcompany'))->get();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [
            'active' => $mailinfo,
            'companyfiles'   => $files,
            'LoggedUserInfo' => $user,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
            'inbox' => $inbox,


        ];
        return view('company.c_editProfile', $data);
    }
    //company mailbox sent
    public function c_mail()
    {
        $user = company::where('id', '=', session('Loggedcompany'))->first();
        $email = $user->email;

        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $sent = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.from', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $data = [
            'sent_info' => $sent,
            'active' => $mailinfo,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
            'inbox' => $inbox,
            'LoggedUserInfo' => $user
        ];
        return view('company.c_mailbox', $data);
    }
    //company mailbox inbox
    public function c_mail_inbox()
    {

        $user = company::where('id', '=', session('Loggedcompany'))->first();
        $email = $user->email;

        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $inbox1 = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();

        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $data = [
            'inbox_info' => $inbox,
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
            'inbox' => $inbox1,
        ];
        return view('company.c_inbox', $data);
    }
    //company mailbox create
    public function c_mail_create()
    {
        $user = company::where('id', '=', session('Loggedcompany'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
            'inbox' => $inbox,

        ];
        return view('company.c_create', $data);
    }
    //company settings
    public function c_settings()
    {
        $user = company::where('id', '=', session('Loggedcompany'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
            'inbox' => $inbox,

        ];
        return view('company.c_settings', $data);
    }
    //company edit jobs
    public function c_editjob($id)
    {
        $id = crypt::decrypt($id);
        $jobinfo = jobs::where('id', '=',  $id)->first();
        $user = company::where('id', '=', session('Loggedcompany'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();

        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'LoggedUserInfo' => $user,
            'jobinfo'        => $jobinfo,
            'active' => $mailinfo,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
            'inbox' => $inbox,


        ];
        return view('company.c_editjobs', $data);
    }
    // company view applicants
    public function c_view_app($id)
    {
        $id = crypt::decrypt($id);
        $appinfo = applicants::where('id', '=', $id)
            ->first();
        if ($appinfo->stat != "2") {
            $appinfo->stat = '1';
            $save = $appinfo->save();
        }
        $companyinfo = company::where('id', '=', session('Loggedcompany'))->first();
        $userinfo = User::where('id', '=', $appinfo->u_id)->first();
        $EB = DB::table('user_prof_e_b_s')
            ->where('user_id', $userinfo->id)
            ->get();
        $WE = DB::table('user_prof_work_exes')
            ->where('user_id', $userinfo->id)
            ->get();
        $skills = DB::table('user_prof_skills')
            ->where('user_id', $userinfo->id)
            ->get();
        $files = DB::table('user_file_uploads')
            ->where('user_id', $userinfo->id)
            ->get();
        $mailinfo = Mailing::where('to', '=', $userinfo->email)
            ->where('mail_active', '=', '1')
            ->count();
        $appcountnew = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->count();
        $appcountnew_info = DB::table('applicants')
            ->where('c_id', session('Loggedcompany'))
            ->where('stat', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $companyinfo->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'user_SkilssInfo' => $skills,
            'user_educbackInfo' => $EB,
            'user_workexInfo' => $WE,
            'user_files' => $files,
            'LoggedUserInfo' => $companyinfo,
            'userinfo' => $userinfo,
            'active' => $mailinfo,
            'appcountnew' => $appcountnew,
            'appcountnew_info' => $appcountnew_info,
            'inbox' => $inbox,
        ];
        return view('company.c_view_app', $data);
    }
    // company talent search
    public function talent(Request $request)
    {
        $search = [
            'skm' => $request->skm,
            'town' => $request->town,
        ];
        if (session('Loggedcompany')) {
            $user111 = company::where('id', '=', session('Loggedcompany'))->first();
        } elseif (session('adminLogged')) {
            $user111 = Admin::where('id', '=', session('adminLogged'))->first();
        }elseif (session('LoggedUser')) {
            $user111 = User::where('id', '=', session('LoggedUser'))->first();
        }else {
            $user111 = null;
        }

        if ((session('Loggedcompany')) || (session('adminLogged')) || (session('LoggedUser'))){
            $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->select('mailings.id', 'users.fname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user111->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->count();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->get();
        }else{
            $inbox = null;
            $comcountnew = null;
            $comcountnew_info = null;
        }
        if ($request->skm != "" && $request->town != "") {
            $user = DB::table('users')
                ->join('user_prof_e_b_s', 'user_prof_e_b_s.user_id', '=', 'users.id')
                ->join('user_prof_work_exes', 'user_prof_work_exes.user_id', '=', 'users.id')
                ->join('user_prof_skills', 'user_prof_skills.user_id', '=', 'users.id')
                ->where('user_prof_skills.skills', 'LIKE', '%' . $request->skm . '%')
                ->where('users.city', 'LIKE', '%' . $request->town . '%')
                ->limit(20)
                ->inRandomOrder()
                ->get();

            $user = $user->unique('user_id');
            $data = [
                'searchinfo' => $search,
                'user' => $user,
                'active' => $inbox,
                'comcountnew' => $comcountnew,
                'comcountnew_info' => $comcountnew_info,
                'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
                'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
            ];
            return view('company.c_talent_search', $data);
        } elseif ($request->skm != "") {
            $user = DB::table('users')
                ->join('user_prof_e_b_s', 'user_prof_e_b_s.user_id', '=', 'users.id')
                ->join('user_prof_work_exes', 'user_prof_work_exes.user_id', '=', 'users.id')
                ->join('user_prof_skills', 'user_prof_skills.user_id', '=', 'users.id')
                ->where('user_prof_skills.skills', 'LIKE', '%' . $request->skm . '%')
                ->limit(20)
                ->inRandomOrder()
                ->get();

            $user = $user->unique('user_id');
            $data = [
                'searchinfo' => $search,
                'user' => $user,
                'active' => $inbox,
                'comcountnew' => $comcountnew,
                'comcountnew_info' => $comcountnew_info,
                'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
                'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
            ];
            return view('company.c_talent_search', $data);
        } elseif ($request->town != "") {
            $user = DB::table('users')
                ->join('user_prof_e_b_s', 'user_prof_e_b_s.user_id', '=', 'users.id')
                ->join('user_prof_work_exes', 'user_prof_work_exes.user_id', '=', 'users.id')
                ->join('user_prof_skills', 'user_prof_skills.user_id', '=', 'users.id')
                ->where('users.city', 'LIKE', '%' . $request->town . '%')
                ->limit(20)
                ->inRandomOrder()
                ->get();

            $user = $user->unique('user_id');
            $data = [
                'searchinfo' => $search,
                'user' => $user,
                'active' => $inbox,
                'comcountnew' => $comcountnew,
                'comcountnew_info' => $comcountnew_info,
                'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
                'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
            ];
            return view('company.c_talent_search', $data);
        } else {
            $user = DB::table('users')
                ->join('user_prof_e_b_s', 'user_prof_e_b_s.user_id', '=', 'users.id')
                ->join('user_prof_work_exes', 'user_prof_work_exes.user_id', '=', 'users.id')
                ->join('user_prof_skills', 'user_prof_skills.user_id', '=', 'users.id')
                ->limit(20)
                ->inRandomOrder()
                ->get();

            $user = $user->unique('user_id');
            $data = [
                'searchinfo' => $search,
                'user' => $user,
                'active' => $inbox,
                'comcountnew' => $comcountnew,
                'comcountnew_info' => $comcountnew_info,
                'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
                'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
            ];
            return view('company.c_talent_search', $data);
        }
    }

    //sign up company
    public function c_signup()
    {
        return view('c_signup');
    }
}
