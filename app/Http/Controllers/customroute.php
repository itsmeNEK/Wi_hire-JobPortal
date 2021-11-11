<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\Mailing;
use App\Models\jobs;
use App\Models\companyfiles;
use App\Models\applicants;
use App\Models\Admin;

class customroute extends Controller
{
    //verification page forget
    public function verificationpageforget($id)
    {

        $email1 = Crypt::decrypt($id);
        $userInfo = User::where('id', '=', $email1)->first();
        $email_Data = [
            'fname' => $userInfo->fname,
            'email' => $userInfo->email,
            'id' => $userInfo->id
        ];
        $data = ['user_info' => $email_Data];

        return view('u_verification_forgot', $data);
    }

    //home controller
    public function home()
    {
        $companyinfo = company::inRandomOrder()->limit(12)->get();
        $company = company::inRandomOrder()->limit(12)->get();
        $jobcontain = jobs::where('stat', '=', '1')->inRandomOrder()->limit(6)->first();
        $jobinfo = jobs::where('stat', '=', '1')
            ->inRandomOrder()->limit(8)->get();
        if (session('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
        }
        if (session('Loggedcompany')) {
            $user = company::where('id', '=', session('Loggedcompany'))->first();
        }
        if (session('adminLogged')) {
            $user = Admin::where('id', '=', session('adminLogged'))->first();
        }
        if ((session('LoggedUser')) || (session('Loggedcompany')) || (session('adminLogged'))) {
            $inbox = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->get();
            $mailinfo = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->count();
            $data = [
                'jobs' => $jobcontain,
                'jobinfo' => $jobinfo,
                'companyinfo' => $companyinfo,
                'active' => $mailinfo,
                'company' => $company,
                'inbox' => $inbox,
                'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
                'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
                'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
            ];
            return view('index', $data);
        }
        $data = [
            'jobs' => $jobcontain,
            'jobinfo' => $jobinfo,
            'companyinfo' => $companyinfo,
            'company' => $company,
            'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
            'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
            'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
        ];
        return view('index', $data);
    }

    //howto controller job seeker
    public function howto()
    {
        if (session('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
        }
        if (session('Loggedcompany')) {
            $user = company::where('id', '=', session('Loggedcompany'))->first();
        }
        if (session('adminLogged')) {
            $user = Admin::where('id', '=', session('adminLogged'))->first();
        }
        if ((session('LoggedUser')) || (session('Loggedcompany')) || (session('adminLogged'))) {

            $inbox = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->get();
            $mailinfo = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->count();
            $data = [
                'active' => $mailinfo,
                'inbox' => $inbox,
                'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
                'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
                'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
            ];
            return view('neutral.howto', $data);
        }
        $data = [
            'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
            'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
            'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
        ];
        return view('neutral.howto', $data);
    }

    //howto controller company
    public function howto1()
    {
        if (session('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
        }
        if (session('Loggedcompany')) {
            $user = company::where('id', '=', session('Loggedcompany'))->first();
        }
        if (session('adminLogged')) {
            $user = Admin::where('id', '=', session('adminLogged'))->first();
        }
        if ((session('LoggedUser')) || (session('Loggedcompany')) || (session('adminLogged'))) {

            $inbox = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->get();
            $mailinfo = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->count();
            $data = [
                'active' => $mailinfo,
                'inbox' => $inbox,
                'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
                'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
                'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
            ];
            return view('neutral.c_howto', $data);
        }
        $data = [
            'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
            'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
            'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
        ];
        return view('neutral.c_howto', $data);
    }

    //howto controller login signup
    public function howto2()
    {
        if (session('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
        }
        if (session('Loggedcompany')) {
            $user = company::where('id', '=', session('Loggedcompany'))->first();
        }
        if (session('adminLogged')) {
            $user = Admin::where('id', '=', session('adminLogged'))->first();
        }
        if ((session('LoggedUser')) || (session('Loggedcompany')) || (session('adminLogged'))) {

            $inbox = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->get();
            $mailinfo = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->count();
            $data = [
                'active' => $mailinfo,
                'inbox' => $inbox,
                'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
                'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
                'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
            ];
            return view('neutral.ls_howto', $data);
        }
        $data = [
            'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
            'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
            'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
        ];
        return view('neutral.ls_howto', $data);
    }

    //howto controller send mail
    public function howto3()
    {
        if (session('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
        }
        if (session('Loggedcompany')) {
            $user = company::where('id', '=', session('Loggedcompany'))->first();
        }
        if (session('adminLogged')) {
            $user = Admin::where('id', '=', session('adminLogged'))->first();
        }
        if ((session('LoggedUser')) || (session('Loggedcompany')) || (session('adminLogged'))) {

            $inbox = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->get();
            $mailinfo = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->count();
            $data = [
                'active' => $mailinfo,
                'inbox' => $inbox,
                'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
                'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
                'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
            ];
            return view('neutral.sm_howto', $data);
        }
        $data = [
            'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
            'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
            'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
        ];
        return view('neutral.sm_howto', $data);
    }
    //howto controller change pass
    public function howto4()
    {
        if (session('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
        }
        if (session('Loggedcompany')) {
            $user = company::where('id', '=', session('Loggedcompany'))->first();
        }
        if (session('adminLogged')) {
            $user = Admin::where('id', '=', session('adminLogged'))->first();
        }
        if ((session('LoggedUser')) || (session('Loggedcompany')) || (session('adminLogged'))) {

            $inbox = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->get();
            $mailinfo = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->count();
            $data = [
                'active' => $mailinfo,
                'inbox' => $inbox,
                'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
                'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
                'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
            ];
            return view('neutral.cp_howto', $data);
        }
        $data = [
            'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
            'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
            'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
        ];
        return view('neutral.cp_howto', $data);
    }
    //howto controller other
    public function howto5()
    {
        if (session('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
        }
        if (session('Loggedcompany')) {
            $user = company::where('id', '=', session('Loggedcompany'))->first();
        }
        if (session('adminLogged')) {
            $user = Admin::where('id', '=', session('adminLogged'))->first();
        }
        if ((session('LoggedUser')) || (session('Loggedcompany')) || (session('adminLogged'))) {

            $inbox = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->get();
            $mailinfo = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->count();
            $data = [
                'active' => $mailinfo,
                'inbox' => $inbox,
                'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
                'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
                'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
            ];
            return view('neutral.o_howto', $data);
        }
        $data = [
            'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
            'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
            'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
        ];
        return view('neutral.o_howto', $data);
    }
    //AboutUs controller
    public function AboutUs()
    {
        if (session('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
        }
        if (session('Loggedcompany')) {
            $user = company::where('id', '=', session('Loggedcompany'))->first();
        }
        if (session('adminLogged')) {
            $user = Admin::where('id', '=', session('adminLogged'))->first();
        }
        if ((session('LoggedUser')) || (session('Loggedcompany')) || (session('adminLogged'))) {

            $inbox = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->get();
            $mailinfo = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->count();
            $data = [
                'active' => $mailinfo,
                'inbox' => $inbox,
                'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
                'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
                'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
            ];
            return view('neutral.n_about', $data);
        }
        return view('neutral.n_about');
    }

    //Report controller
    public function Report()
    {
        if (session('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
        }
        if (session('Loggedcompany')) {
            $user = company::where('id', '=', session('Loggedcompany'))->first();
        }
        if (session('adminLogged')) {
            $user = Admin::where('id', '=', session('adminLogged'))->first();
        }
        if ((session('LoggedUser')) || (session('Loggedcompany')) || (session('adminLogged'))) {

            $inbox = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->get();
            $mailinfo = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->count();
            $data = [
                'active' => $mailinfo,
                'inbox' => $inbox,
                'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
                'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
                'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
            ];
            return view('neutral.n_report', $data);
        }
        return view('neutral.n_report');
    }

    // companies
    public function companies(Request $request)
    {

        $search = [
            'jobname' => $request->jobname,
            'town' => $request->town,

        ];

        if ($request->jobname != "" && $request->town != "") {
            $jobs = company::where('cname', 'LIKE', '%' . $request->jobname . '%')
                ->where('city', 'LIKE', '%' . $request->town . '%')
                ->where('approved', '=', '0')
                ->inRandomOrder()
                ->orderby('id', 'asc')->paginate(20);

        } elseif ($request->jobname != "") {
            $jobs = company::where('cname', 'LIKE', '%' . $request->jobname . '%')
                ->where('approved', '=', '0')
                ->inRandomOrder()
                ->orderby('id', 'asc')->paginate(20);
        } elseif ($request->town != "") {
            $jobs = company::where('city', 'LIKE', '%' . $request->town . '%')
                ->where('approved', '=', '0')
                ->inRandomOrder()
                ->orderby('id', 'asc')->paginate(20);
        } else {
            $jobs = company::where('approved', '=', '0')
                ->inRandomOrder()
                ->paginate(20);
        }

        if (session('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
        } elseif (session('adminLogged')) {
            $user = Admin::where('id', '=', session('adminLogged'))->first();
        }

        if ((session('LoggedUser')) || (session('adminLogged'))) {

            $mailinfo = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->count();
        } else {
            $mailinfo = null;
        }
        $data = [
            'searchinfo' => $search,
            'jobinfo'  => $jobs,
            'active'  => $mailinfo,
            'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
            'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
            'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
        ];

        return view('neutral.n_companies', $data);
    }
    // company view
    public function companies_view($id)
    {
        $id = crypt::decrypt($id);
        $companyinfo = company::where('id', '=', $id)->first();
        $companyfiles = companyfiles::where('company_id', '=', $companyinfo->id)->get();
        if (session('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
        } elseif (session('adminLogged')) {
            $user = Admin::where('id', '=', session('adminLogged'))->first();
        } else {
            $user = null;
        }

        if ((session('LoggedUser')) || (session('adminLogged'))) {

            $mailinfo = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->count();

            $inbox = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->get();
            $comcountnew = DB::table('companies')
                ->where('approved', '=', '1')
                ->count();
            $comcountnew_info = DB::table('companies')
                ->where('approved', '=', '1')
                ->get();
        } else {
            $mailinfo = null;
            $inbox  = null;
            $comcountnew  = null;
            $comcountnew_info = null;
        }

        $jobs = jobs::where('stat', '=', '1')
            ->where('c_id', '=', $companyinfo->id)
            ->inRandomOrder()
            ->paginate(20);

        $data = [
            'jobinfo'  => $jobs,
            'companyinfo'  => $companyinfo,
            'active' => $mailinfo,
            'LoggedUserInfo' => $user,
            'inbox' => $inbox,
            'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
            'appcountnew' => $comcountnew,
            'comcountnew_info' => $comcountnew_info,
            'companyfiles' => $companyfiles
        ];

        return view('neutral.n_company_view', $data);
    }
    // company view job
    public function jobs(Request $request)
    {

        $search = [
            'jobname' => $request->jobname,
            'town' => $request->town,

        ];


        if (session('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
        } elseif (session('adminLogged')) {
            $user = Admin::where('id', '=', session('adminLogged'))->first();
        }
        if ((session('LoggedUser')) || (session('adminLogged'))) {

            $mailinfo = Mailing::where('to', '=', $user->email)
                ->where('mail_active', '=', '1')
                ->count();
        } else {
            $mailinfo = null;
        }
        if ($request->jobname != "" && $request->town != "") {
            $jobs = jobs::where('jobtit', 'LIKE', '%' . $request->jobname . '%')
                ->where('city', 'LIKE', '%' . $request->town . '%')
                ->where('stat', '=', '1')
                ->inRandomOrder()
                ->orderby('id', 'asc')->paginate(20);
        } elseif ($request->jobname != "") {
            $jobs = jobs::where('jobtit', 'LIKE', '%' . $request->jobname . '%')
                ->where('stat', '=', '1')
                ->inRandomOrder()
                ->orderby('id', 'asc')->paginate(20);
        } elseif ($request->town != "") {
            $jobs = jobs::where('city', 'LIKE', '%' . $request->town . '%')
                ->where('stat', '=', '1')
                ->inRandomOrder()
                ->orderby('id', 'asc')->paginate(20);
        } else {
            if (session('LoggedUser')) {
                $jobs = jobs::where('city', 'LIKE', '%' . $user->city . '%')
                    ->where('stat', '=', '1')
                    ->inRandomOrder()
                    ->paginate(20);
            } else {
                $jobs = jobs::where('stat', '=', '1')
                    ->inRandomOrder()
                    ->paginate(20);
            }
        }

        $data = [
            'searchinfo' => $search,
            'jobinfo'  => $jobs,
            'active' => $mailinfo,
            'adminLogged' => Admin::where('id', '=', session('adminLogged'))->first(),
            'LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first(),
            'LoggedCompanyInfo' => company::where('id', '=', session('Loggedcompany'))->first(),
        ];

        return view('neutral.n_jobs', $data);
    }
    // company applicants
    public function apply($id)
    {
        $job = jobs::where('id', '=', $id)->first();
        $user = User::where('id', '=', session('LoggedUser'))->first();
        $app = new applicants;
        $app->jobID = $job->id;
        $app->u_id = $user->id;
        $app->username = $user->fname . $user->lname;
        $app->c_id = $job->c_id;
        $app->jobtit = $job->jobtit;
        $app = $app->save();

        if ($app) {
            return back();
        } else {
            echo 'not save';
        }
    }
}
