<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_profWorkEx;
use Illuminate\Support\Facades\DB;

class addWorkEx extends Controller
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
            'user_id'=>'required',
            'Positiontit'=>'required',
            'Position'=>'required',
            'Company'=>'required',
            'From'=>'required',
            'To'=>'required',
            'Specialization'=>'required',
            'Role'=>'required',
            'Industry'=>'required',
            'Country'=>'required',
            'Monthly'=>'required',
        ]);
        $user = new user_profWorkEx;
        $user->user_id =$request->user_id;
        $user->postit =$request->Positiontit;
        $user->comname =$request->Company;
        $user->durationfrom =$request->From;
        $user->durationto=$request->To;
        $user->specialization=$request->Specialization;
        $user->role=$request->Role;
        $user->country=$request->Country;
        $user->salary=$request->Monthly;
        $user->positionlevel=$request->Position;
        $user->industry=$request->Industry;
        $user->additional=$request->additional;
        $save = $user->save();
        if ($user && $save) {
            return redirect()->route('u_dash')->with('success','Successfully added');
        } else {
            return back()->with('fail', 'Something went wrong, try again later.');
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'Positiontit'=>'required',
            'Position'=>'required',
            'Company'=>'required',
            'From'=>'required',
            'To'=>'required',
            'Specialization'=>'required',
            'Role'=>'required',
            'Industry'=>'required',
            'Country'=>'required',
            'Monthly'=>'required',
        ]);


        $update = DB::table('user_prof_work_exes')
        ->where('id',$request->data_id)
        ->update([
            'postit'=>$request['Positiontit'],
            'comname'=>$request['Company'],
            'durationfrom'=>$request['From'],
            'durationto'=>$request['To'],
            'specialization'=>$request['Specialization'],
            'role'=>$request['Role'],
            'country'=>$request['Country'],
            'positionlevel'=>$request['Position'],
            'salary'=>$request['Monthly'],
            'industry'=>$request['Industry'],
            'additional'=>$request['additional'],
        ]);

        return redirect()->route('u_dash')->with('success','record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Delete($id)
    {
        $delete = DB::table('user_prof_work_exes')
        ->where('id',$id)
        ->delete();
        if($delete){
            return redirect(route('u_dash'))->with('success','Record Has been deleted');

        }else{
            return back()->with('fail','Something went wrong, try again later.');
        }
    }
}
