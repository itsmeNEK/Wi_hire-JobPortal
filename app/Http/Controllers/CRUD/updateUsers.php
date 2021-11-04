<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\Helper;
use Carbon\Carbon;

class updateUsers extends Controller
{
    public function u_updatePI(Request $request){
        $request->validate([
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $date = Carbon::now();
        //Get date and time
        $date->toDateTimeString();

        $user = User::find($request->id);

        if(empty($request->avatar)){

        }
        else{
            $path = 'users/images/';
            $newname= Helper::renameFile($path,$request->file('avatar')->getClientOriginalName());
            $upload = $request->avatar->move(public_path($path),  $newname);
            $user->prof_pic = $newname;
        }

            $user->fname =$request->fname;
            $user->lname =$request->lname;
            $user->mname =$request->mname;
            $user->mob_num = $request->mobileNumber;
            $user->province =$request->province;
            $user->city =$request->city;
            $user->dob =$request->dob;
            $user->bithplace =$request->bithplace;
            $user->civilstat =$request->civilstat;
            $user->street =$request->street;
            $user->barangay =$request->barangay;
            $user->HBnum =$request->HBnum;
            $user->postcode =$request->postcode;
            $user->gender =$request->gender;
            $user->updated_at = $date;
            $user->save();
            if ($user){
                return redirect(route('u_dash'))->with('fail','Something went wrong, try again later.');
            }else{
                return back()->with('fail','Something went wrong, try again later.');
            }

    }
}
