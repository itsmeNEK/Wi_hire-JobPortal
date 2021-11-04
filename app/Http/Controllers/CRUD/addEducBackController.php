<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_profEB;
use Illuminate\Support\Facades\DB;

class addEducBackController extends Controller
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
            'univ'=>'required',
            'grad_date'=>'required',
            'qualification'=>'required',
            'univloc'=>'required',
            'field'=>'required',
            'major'=>'required',
            'grade'=>'required',
            'additional'=>'max:255',
        ]);

        $user = new user_profEB;
        $user->user_id =$request->user_id;
        $user->university =$request->univ;
        $user->grade_date =$request->grad_date;
        $user->qualification =$request->qualification;
        $user->unic_loc =$request->univloc;
        $user->field=$request->field;
        $user->major=$request->major;
        $user->grade=$request->grade;
        $user->additional=$request->additional;
        $save = $user->save();
       if ($user && $save){
        return redirect()->route('u_dash')->with('success','Successfully added');
            }else{
                return back()->with('fail','Something went wrong, try again later.');
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
            'univ'=>'required',
            'grad_date'=>'required',
            'qualification'=>'required',
            'univloc'=>'required',
            'field'=>'required',
            'major'=>'required',
            'grade'=>'required',
            'additional'=>'max:255',
        ]);

        $update = DB::table('user_prof_e_b_s')
        ->where('id',$request->dataID)
        ->update([
        'university'=>$request['univ'],
        'grade_date'=>$request['grad_date'],
        'qualification'=>$request['qualification'],
        'unic_loc'=>$request['univloc'],
        'field'=>$request['field'],
        'major'=>$request['major'],
        'grade'=>$request['grade'],
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
    public function Delete($id){

        $delete = DB::table('user_prof_e_b_s')
        ->where('id',$id)
        ->delete();
        if($delete){
            return redirect(route('u_dash'))->with('success','Record Has been deleted');
        }else{
            return back()->with('fail','Something went wrong, try again later.');
        }
    }
}
