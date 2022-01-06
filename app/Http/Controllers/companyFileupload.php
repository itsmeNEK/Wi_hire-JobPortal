<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use App\Models\companyfiles;

class companyFileupload extends Controller
{
    public function upload(Request $request){
        $request->validate([
            'user_files' => 'required'
            ]);

        $path = 'company_files/';
        $newname= Helper::renameFile($path,$request->file('user_files')->getClientOriginalName());

        $upload = $request->user_files->move(public_path($path), $newname);

        $user = new companyfiles;
        $user->company_id=$request->userid;
        $user->file_path=$newname;
        $save = $user->save();

        if($upload && $save){
            return redirect(route('c_update'));
        }elseif ($upload){
            echo "File has been Up to resources but not in database";
        }
        elseif ($save){
            echo "File has been Up to database but not in resources";
        }
        else{
            echo "File has not been Uploaded in both database and resources";
        }
    }
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
        //
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
    public function delete(Request $request)
    {
        $delete = DB::table('companyfiles')
        ->where('id',$request->id)
        ->delete();
        if($delete){
            return redirect(route('c_update'));
        }else{
            return back()->with('fail','Something went wrong, try again later.');
        }
    }
}
