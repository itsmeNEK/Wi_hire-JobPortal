<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jobs;
use App\Models\company;

class jobController extends Controller
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
    public function c_jobsave(Request $request)
    {
        $request->validate([
            'jobtit' => 'required',
            'jobdes' => 'required',
            'qualification' => 'required',
            'exreq' => 'required',
            'special' => 'required',
            'mimsal' => 'required',
            'maxsal' => 'required',
            'typerole' => 'required',
            'postlev' => 'required',
            'city' => 'required',
        ]);
        if($request->id!=null){
            $jobs = jobs::find($request->id);
            $message = 'Job Updated';
        }else{
            $message = 'Job Posted';
            $jobs = new jobs;
            $jobs->c_id=$request->c_id;
            $jobs->prof_pic=$request->prof_pic;
            $jobs->cname=$request->cname;
            $jobs->city=$request->city;
        }
        $jobs->jobtit=$request->jobtit;
        $jobs->jobdes=$request->jobdes;
        $jobs->qualification=$request->qualification;
        $jobs->exreq=$request->exreq;
        $jobs->special=$request->special;
        $jobs->mimsal=$request->mimsal;
        $jobs->maxsal=$request->maxsal;
        $jobs->typerole=$request->typerole;
        $jobs->postlev=$request->postlev;
        $save = $jobs->save();

        if($save){
                return redirect()->route('c_manage')->with('success',$message);
        }else{
            return back()->with('fail', 'Something went wrong!');
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
