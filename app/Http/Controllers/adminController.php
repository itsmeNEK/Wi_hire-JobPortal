<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\company;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\Mailing;
use App\Models\jobs;
use App\Models\companyfiles;
use App\Models\Admin;
use App\Models\reportbug;

class adminController extends Controller
{


    //admin login
    public function admin_login()
    {
        if (session()->has('adminLogged')) {
            //user pull and reutrn home page
            session()->pull('adminLogged');
            return view('admin_login');
        } else {
            session()->pull('adminLogged');
            return view('admin_login');
        }
    }

    //admin settings
    public function a_settings()
    {
        $user = Admin::where('id', '=', session('adminLogged'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'inbox' => $inbox,
            'comcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,
        ];
        return view('admin.a_settings', $data);
    }

    //admin dashboard
    public function a_dash()
    {
        $usercpount = DB::table('users')
            ->count();
        $jobcount = DB::table('jobs')
            ->where('stat', '=', '1')
            ->count();
        $comcount = DB::table('companies')
            ->count();
        $company = company::where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        $user = Admin::where('id', '=', session('adminLogged'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [

            'LoggedUserInfo' => $user,
            'active' => $mailinfo,
            'jobcount' => $jobcount,
            'usercpount' => $usercpount,
            'comcount' => $comcount,
            'inbox' => $inbox,
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'comcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,
            'company' => $company,
        ];
        return view('admin.a_dashboard', $data);
    }

    //admin logout
    public function a_logout()
    {
        //if session is in use
        if (session()->has('adminLogged')) {
            //user pull and reutrn home page
            session()->pull('adminLogged');
            return redirect('home');
        }
    }
    // admin candidate table
    public function a_candidate(Request $request)
    {
        $search = [
            'fname' => $request->fname,
            'lname' => $request->lname,

        ];
        if ($request->fname != "" && $request->lname != "") {
            $candidates = User::where('stat', '=', '1')
                ->where('fname',  'LIKE', '%' . $request->fname . '%')
                ->where('lname',  'LIKE', '%' . $request->lname . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } elseif ($request->fname != "") {
            $candidates = User::where('stat', '=', '1')
                ->where('fname',  'LIKE', '%' . $request->fname . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } elseif ($request->lname != "") {
            $candidates = User::where('stat', '=', '1')
                ->where('lname',  'LIKE', '%' . $request->lname . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } else {
            $candidates = User::where('stat', '=', '1')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        }

        $user = Admin::where('id', '=', session('adminLogged'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'LoggedUserInfo' => $user,
            'active' => $mailinfo,
            'candidates' => $candidates,
            'inbox' => $inbox,
            'reportcount' => $reportcount,
            'searchinfo' => $search,
            'reportcount_info' => $reportcount_info,
            'comcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,
        ];

        return view('admin.a_candidates', $data);
    }
    // admin candidate table view
    public function a_candidate_block(Request $request)
    {
        $search = [
            'fname' => $request->fname,
            'lname' => $request->lname,

        ];
        if ($request->fname != "" && $request->lname != "") {
            $candidates = User::where('stat', '=', '0')
                ->where('fname',  'LIKE', '%' . $request->fname . '%')
                ->where('lname',  'LIKE', '%' . $request->lname . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } elseif ($request->fname != "") {
            $candidates = User::where('stat', '=', '0')
                ->where('fname',  'LIKE', '%' . $request->fname . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } elseif ($request->lname != "") {
            $candidates = User::where('stat', '=', '0')
                ->where('lname',  'LIKE', '%' . $request->lname . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } else {
            $candidates = User::where('stat', '=', '0')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        }

        $user = Admin::where('id', '=', session('adminLogged'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'LoggedUserInfo' => $user,
            'active' => $mailinfo,
            'candidates' => $candidates,
            'inbox' => $inbox,
            'reportcount' => $reportcount,
            'searchinfo' => $search,
            'reportcount_info' => $reportcount_info,
            'comcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,
        ];

        return view('admin.a_candidatesBlock', $data);
    }
    // admin candidate table blocked
    public function a_candidate_blocked(Request $request)
    {
        $candidates = User::find($request->id);
        $candidates->stat = 0;
        $candidates->save();
        return back()->with('success', 'Candidate Successfully Blocked');
    }
    // admin candidate table blocked
    public function a_candidate_unblocked(Request $request)
    {
        $candidates = User::find($request->id);
        $candidates->stat = 1;
        $candidates->save();
        return back()->with('success', 'Candidate Successfully Unblocked');
    }
    // admin companies table new
    public function a_companies(Request $request)
    {
        $search = [
            'cname' => $request->cname,
            'email' => $request->email,

        ];
        if ($request->cname != "" && $request->email != "") {
            $company = company::where('approved', '=', '1')
                ->where('cname',  'LIKE', '%' . $request->cname . '%')
                ->where('city',  'LIKE', '%' . $request->email . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } elseif ($request->cname != "") {
            $company = company::where('approved', '=', '1')
                ->where('cname',  'LIKE', '%' . $request->cname . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } elseif ($request->email != "") {
            $company = company::where('approved', '=', '1')
                ->where('city',  'LIKE', '%' . $request->email . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } else {
            $company = company::where('approved', '=', '1')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        }

        $user = Admin::where('id', '=', session('adminLogged'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'LoggedUserInfo' => $user,
            'active' => $mailinfo,
            'company' => $company,
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'inbox' => $inbox,
            'searchinfo' => $search,
            'comcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,
        ];

        return view('admin.a_newCompany', $data);
    }

    // admin companies table approve
    public function a_companies_approved(Request $request)
    {
        $search = [
            'cname' => $request->cname,
            'email' => $request->email,

        ];
        if ($request->cname != "" && $request->email != "") {
            $company = company::where('approved', '=', '0')
                ->where('cname',  'LIKE', '%' . $request->cname . '%')
                ->where('city',  'LIKE', '%' . $request->email . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } elseif ($request->cname != "") {
            $company = company::where('approved', '=', '0')
                ->where('cname',  'LIKE', '%' . $request->cname . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } elseif ($request->email != "") {
            $company = company::where('approved', '=', '0')
                ->where('city',  'LIKE', '%' . $request->email . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } else {
            $company = company::where('approved', '=', '0')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        }
        $user = Admin::where('id', '=', session('adminLogged'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'LoggedUserInfo' => $user,
            'active' => $mailinfo,
            'company' => $company,
            'inbox' => $inbox,
            'reportcount' => $reportcount,
            'searchinfo' => $search,
            'reportcount_info' => $reportcount_info,
            'comcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,
        ];

        return view('admin.a_AppCompany', $data);
    }

    // admin companies table
    public function a_companies_blocked(Request $request)
    {
        $search = [
            'cname' => $request->cname,
            'email' => $request->email,

        ];
        if ($request->cname != "" && $request->email != "") {
            $company = company::where('approved', '=', '2')
                ->where('cname',  'LIKE', '%' . $request->cname . '%')
                ->where('city',  'LIKE', '%' . $request->email . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } elseif ($request->cname != "") {
            $company = company::where('approved', '=', '2')
                ->where('cname',  'LIKE', '%' . $request->cname . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } elseif ($request->email != "") {
            $company = company::where('approved', '=', '2')
                ->where('city',  'LIKE', '%' . $request->email . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } else {
            $company = company::where('approved', '=', '2')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        }
        $user = Admin::where('id', '=', session('adminLogged'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'LoggedUserInfo' => $user,
            'active' => $mailinfo,
            'company' => $company,
            'inbox' => $inbox,
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'comcountnew' => $comcountnew,
            'searchinfo' => $search,
            'comcountnew_info' => $comcountnew_info,
        ];

        return view('admin.a_blockCompany', $data);
    }
    // admin companies table
    public function a_approveCom(Request $request)
    {
        $company = company::find($request->id);
        $company->approved = '0';
        $company->save();

        return back()->with('success', 'Company Successfully Approved');
    }
    // admin job table mute
    public function a_jobs_mute(Request $request)
    {
        $company = jobs::find($request->id);
        $company->stat = '0';
        $company->save();

        return back()->with('success', 'Company Successfully Muted');
    }
    // admin companies table unmute
    public function a_jobs_unmute(Request $request)
    {
        $company = jobs::find($request->id);
        $company->stat = '0';
        $company->save();

        return back()->with('success', 'Job Successfully Unmuted');
    }
    // admin jobs table
    public function a_jobs(Request $request)
    {
        $search = [
            'cname' => $request->cname,
            'jobtit' => $request->jobtit,

        ];
        if ($request->cname != "" && $request->jobtit != "") {
            $candidates = jobs::where('stat', '=', '1')
                ->where('cname',  'LIKE', '%' . $request->cname . '%')
                ->where('jobtit',  'LIKE', '%' . $request->jobtit . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } elseif ($request->cname != "") {
            $candidates = jobs::where('stat', '=', '1')
                ->where('cname',  'LIKE', '%' . $request->cname . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } elseif ($request->jobtit != "") {
            $candidates = jobs::where('stat', '=', '1')
                ->where('jobtit',  'LIKE', '%' . $request->jobtit . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } else {
            $candidates = jobs::where('stat', '=', '1')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        }
        $user = Admin::where('id', '=', session('adminLogged'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'LoggedUserInfo' => $user,
            'active' => $mailinfo,
            'jobs' => $candidates,
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'inbox' => $inbox,
            'comcountnew' => $comcountnew,
            'searchinfo' => $search,
            'comcountnew_info' => $comcountnew_info,
        ];

        return view('admin.a_jobs', $data);
    }
    // admin jobs table inactive
    public function a_jobs_nactive(Request $request)
    {
        $search = [
            'cname' => $request->cname,
            'jobtit' => $request->jobtit,

        ];
        if ($request->cname != "" && $request->jobtit != "") {
            $candidates = jobs::where('stat', '=', '0')
                ->where('cname',  'LIKE', '%' . $request->cname . '%')
                ->where('jobtit',  'LIKE', '%' . $request->jobtit . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } elseif ($request->cname != "") {
            $candidates = jobs::where('stat', '=', '0')
                ->where('cname',  'LIKE', '%' . $request->cname . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } elseif ($request->jobtit != "") {
            $candidates = jobs::where('stat', '=', '0')
                ->where('jobtit',  'LIKE', '%' . $request->jobtit . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } else {
            $candidates = jobs::where('stat', '=', '0')
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        }
        $user = Admin::where('id', '=', session('adminLogged'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'LoggedUserInfo' => $user,
            'active' => $mailinfo,
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'jobs' => $candidates,
            'searchinfo' => $search,
            'inbox' => $inbox,
            'comcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,
        ];

        return view('admin.a_jobsInactive', $data);
    }
    //admin view
    public function a_view_can($id)
    {
        $id = crypt::decrypt($id);
        $userinfo = User::where('id', '=', $id)
            ->first();
        $companyinfo = admin::where('id', '=', session('adminLogged'))->first();
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
            ->orderBy('created_at', 'desc')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $userinfo->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
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
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'inbox' => $inbox,
            'comcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,
        ];
        return view('admin.a_view_can', $data);
    }
    // view company profile admin

    public function a_view_com($id)
    {
        $id = crypt::decrypt($id);
        $user = admin::where('id', '=', session('adminLogged'))->first();
        $user1 = company::where('id', '=', $id)->first();
        $files = companyfiles::where('company_id', '=', $id)->get();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'active' => $mailinfo,
            'companyfiles'    => $files,
            'company' => $user1,
            'LoggedUserInfo' => $user,
            'inbox' => $inbox,
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'comcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,

        ];

        return view('admin.a_company_view', $data);
    }
    // admin company table blocked
    public function a_companies_block(Request $request)
    {
        $candidates = company::find($request->id);
        $candidates->approved = 2;
        $candidates->save();
        return back()->with('success', 'Company Successfully Blocked');
    }
    // admin company table unblocked
    public function a_companies_unblocked(Request $request)
    {
        $candidates = company::find($request->id);
        $candidates->approved = 0;
        $candidates->save();
        return back()->with('success', 'Company Successfully Unblocked');
    }
    //change password admin
    public function a_cp(Request $request)
    {
        $request->validate([
            'currentpass' => 'required|min:6',
            'newpass' => 'required|min:6',
            'cpass' => 'required|min:6',
        ]);

        $user = Admin::find($request->id);

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
    //admin mailbox sent
    public function a_mail()
    {
        $user = admin::where('id', '=', session('adminLogged'))->first();
        $email = $user->email;

        $sent_info = DB::table('mailings')
            ->where('from', $email)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $sent_info = DB::table('mailings')
            ->leftjoin('users', 'mailings.to', '=', 'users.email')
            ->leftjoin('companies', 'mailings.to', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from', 'mailings.to')
            ->where('from', $user->email)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        $data = [
            'sent_info' => $sent_info,
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'admin' => 'admin',
            'inbox' => $inbox,
            'comcountnew' => $comcountnew,
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'comcountnew_info' => $comcountnew_info,
        ];
        return view('admin.a_mailbox', $data);
    }
    //admin mailbox inbox
    public function a_mail_inbox()
    {
        $user = admin::where('id', '=', session('adminLogged'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox1 = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from', 'mailings.to')
            ->where('to', $user->email)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        $data = [
            'inbox_info' => $inbox,
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'admin' => 'admin',
            'inbox' => $inbox1,
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'comcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,
        ];
        return view('admin.a_inbox', $data);
    }

    //admin report
    public function a_report()
    {
        $user = admin::where('id', '=', session('adminLogged'))->first();

        $inbox = DB::table('reportbugs')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox1 = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'inbox_info' => $inbox,
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'admin' => 'admin',
            'inbox' => $inbox1,
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'comcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,
        ];
        return view('admin.a_report', $data);
    }

    //admin view report
    public function a_report_view($id)
    {
        $id = crypt::decrypt($id);

        $mailinfo = reportbug::where('id', '=', $id)->first();
        $user = Admin::where('id', '=', session('adminLogged'))->first();
        $active = Mailing::where('to', '=', $user->email)->count();

        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();

        if ($user->email != $mailinfo->from) {
            //seen mail
            $seen = DB::table('reportbugs')
                ->where('id', $id)
                ->update(['active' => '0']);
        }

        $data = [
            'LoggedUserInfo' => $user,
            'mailInfo' => $mailinfo,
            'active' => $active,
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'inbox' => $inbox,
            'comcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,
        ];
        return view('admin.a_veiw_report', $data);
    }

    //admin mailbox create
    public function a_mail_create()
    {
        $user = Admin::where('id', '=', session('adminLogged'))->first();
        $mailinfo = Mailing::where('to', '=', $user->email)
            ->where('mail_active', '=', '1')
            ->count();
        $inbox = DB::table('mailings')
            ->leftjoin('users', 'mailings.from', '=', 'users.email')
            ->leftjoin('companies', 'mailings.from', '=', 'companies.email')
            ->select('mailings.id', 'users.fname', 'companies.cname', 'mailings.subject', 'mailings.created_at', 'mailings.mail_active', 'mailings.from')
            ->where('mailings.to', $user->email)
            ->where('mail_active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $comcountnew = DB::table('companies')
            ->where('approved', '=', '1')
            ->count();
        $comcountnew_info = DB::table('companies')
            ->where('approved', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $reportcount = reportbug::where('active', '=', '1')
            ->count();
        $reportcount_info = reportbug::where('active', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        $data = [
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'inbox' => $inbox,
            'comcountnew' => $comcountnew,
            'reportcount' => $reportcount,
            'reportcount_info' => $reportcount_info,
            'comcountnew_info' => $comcountnew_info,
        ];
        return view('admin.a_create', $data);
    }
}
