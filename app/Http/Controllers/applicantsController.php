<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\applicants;
use App\Models\User;
use App\Models\jobs;

class applicantsController extends Controller
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
    public function store($id)
    {

        $job = jobs::where('id', '=', $id)->first();
        $user = User::where('id', '=', session('LoggedUser'))->first();

        $dob = applicants::where('jobID', '=', $id)
            ->where('u_id', '=', $user->id)
            ->first();

        if (!$dob) {
            echo 'new';
            $app = new applicants;
            $app->jobID = $job->id;
            $app->u_id = $user->id;
            $app->typerole = $job->typerole;
            $app->postlev = $job->postlev;
            $app->username = $user->fname ." ". $user->lname;
            $app->c_id = $job->c_id;
            $app->jobtit = $job->jobtit;
            $app = $app->save();

            if ($app) {
                return back()->with('success', 'You succesfully applied');
            }
        }else{
            return back()->with('fail', 'You have already applied this job');
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
    public function c_app_reject(Request $request)
    {
        $job = applicants::where('id', '=', $request->id)->first();
        $job->stat = "3";
        $job->save();
        return back();
    }
    public function c_app_acc(Request $request)
    {
        $app = applicants::where('id', '=', $request->id)->first();
        $app->stat = "3";
        $app->save();

        $jobs = jobs::where('id','=',$app->jobID)->first();
        $jobs->stat = '0';
        $jobs->save();
        return redirect()->route('c_appManageViewed')->with('success','Applicant Approved');
    }
}
