<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\mail\verificationEmail;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\company;
use App\Models\VerifyCompany;
use App\Models\loginhistory;
use Carbon\Carbon;
use App\Models\VerifyUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use function Symfony\Component\VarDumper\Dumper\esc;

class AuthController extends Controller
{
    //user register
    public function u_save(Request $request)
    {
        //validate request

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users|unique:companies',
            'password' => 'required|min:6',
            'cpassword' => 'required|min:6'
        ]);
        $pass1 = $request->password;
        $pass2 = $request->cpassword;

        if ($pass1 == $pass2) {
            /** Make avata */
            $path = 'users/images/';
            $fontPath = public_path('fonts/Oliciy.ttf');
            $char = strtoupper($request->fname[0]);
            $char1 = strtoupper($request->lname[0]);
            $newchar = $char . $char1;
            $newAvatarName = rand(12, 34353) . time() . '_avatar.png';
            $dest = $path . $newAvatarName;

            $createAvatar = makeAvatar($fontPath, $dest, $newchar);
            $picture = $createAvatar == true ? $newAvatarName : '';

            //insert data to database
            $user = new User;
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->prof_pic = $picture;
            $user->password = Hash::make($request->password);
            $save = $user->save();

            $userInfo = User::where('email', '=', $request->email)->first();
            $user_id = $userInfo->id;
            $code = str::Random(10);

            // inserting CODE and user id in VERIFY
            $verifyEmail = new VerifyUser;
            $verifyEmail->code = $code;
            $verifyEmail->user_email = $request->email;
            $verifyEmail->user_id = $user_id;
            $save = $verifyEmail->save();


            // sending verification code through mail
            $email_Data = [
                'code' => $code,
                'fname' => $request->fname,
                'email' => $request->email,
            ];
            Mail::to($user->email)->send(new verificationEmail($email_Data));
            $data = Crypt::encrypt($user_id);
            if ($save) {
                return redirect()->route('u_verify', $data);
            } else {
                return back()->with('fail', 'Something went wrong, try again later.');
            }
        } else {
            return back()->with('fail', 'Password do not match.');
        }
    }

    public function u_resetcheck(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'npassword' => 'required',
            'cpassword' => 'required',
        ]);
        $date = Carbon::now();
        //Get date and time
        $date->toDateTimeString();

        $verify_info = VerifyUser::where('user_id', '=', $request->id)->first();
        if ($verify_info->code == $request->code) {
            // update password
            $user = User::find($request->id);
            $user->password = Hash::make($request->npassword);
            $user->updated_at = $date;
            $save = $user->save();

            if ($save) {
                return redirect(route('u_login'))->with('success', 'You may Now Login');
            } else {
                return back()->with('fail', 'Something went wrong, try again later.');
            }
        } else {
            return back()->with('fail', 'Wrong code inputed!');
        }
    }

    public function c_resetcheck(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'npassword' => 'required',
            'cpassword' => 'required',
        ]);
        $date = Carbon::now();
        //Get date and time
        $date->toDateTimeString();

        $verify_info = VerifyCompany::where('comany_id', '=', $request->id)->first();
        if ($verify_info->code == $request->code) {
            // update password
            $user = company::find($request->id);
            $user->password = Hash::make($request->npassword);
            $user->updated_at = $date;
            $save = $user->save();

            if ($save) {
                return redirect(route('c_login'))->with('success', 'You may Now Login');
            } else {
                return back()->with('fail', 'Something went wrong, try again later.');
            }
        } else {
            return back()->with('fail', 'Wrong code inputed!');
        }
    }
    // resend code vc
    public function u_resendcode($id)
    {

        $code = str::Random(10);
        $update = DB::table('verify_users')
            ->where('user_id', $id)
            ->update([
                'code' => $code,
            ]);
        $userInfo = User::where('id', '=', $id)->first();
        $email_Data = [
            'code' => $code,
            'fname' => $userInfo->fname,
            'email' => $userInfo->email,
        ];
        Mail::to($userInfo->email)->send(new verificationEmail($email_Data));
        if ($update) {
            $data = Crypt::encrypt($id);
            return redirect(route('u_verify', $data));
        }
    }

    // resend code vc company
    public function c_resendcode($id)
    {

        $code = str::Random(10);
        $update = DB::table('verify_companies')
            ->where('comany_id', $id)
            ->update([
                'code' => $code,
            ]);
        $userInfo = company::where('id', '=', $id)->first();
        $email_Data = [
            'code' => $code,
            'fname' => $userInfo->cpname,
            'email' => $userInfo->email,
        ];
        Mail::to($userInfo->email)->send(new verificationEmail($email_Data));
        if ($update) {
            $data = Crypt::encrypt($id);
            return redirect(route('c_verify', $data));
        }
    }

    // resend code vc forget
    public function u_resendcodeforget($id)
    {
        $code = str::Random(10);
        $update = DB::table('verify_users')
            ->where('user_id', $id)
            ->update([
                'code' => $code,
            ]);
        $userInfo = User::where('id', '=', $id)->first();
        $email_Data = [
            'code' => $code,
            'fname' => $userInfo->fname,
            'email' => $userInfo->email,
        ];
        Mail::to($userInfo->email)->send(new verificationEmail($email_Data));
        if ($update) {
            $data = Crypt::encrypt($id);
            return redirect(route('u_verifyforget', $data));

        }
    }

    // resend code vc forget company
    public function c_resendcodeforget($id)
    {
        $code = str::Random(10);
        $update = DB::table('verify_companies')
            ->where('comany_id', $id)
            ->update([
                'code' => $code,
            ]);
        $userInfo = company::where('id', '=', $id)->first();
        $email_Data = [
            'code' => $code,
            'fname' => $userInfo->cpname,
            'email' => $userInfo->email,
        ];
        Mail::to($userInfo->email)->send(new verificationEmail($email_Data));
        if ($update) {
            $data = Crypt::encrypt($id);
            return redirect(route('c_verifyforget', $data));

        }
    }

    //user check login
    public function admin_check(Request $request)
    {
        //validate request
        $request->validate([
            'uname' => 'required',
            'password' => 'required|min:6'
        ]);
        $userInfo = Admin::where('uname', '=', $request->uname)->first();
        if (!$userInfo) {
            return back()->with('fail', 'We do not recognize your username!');
        } else {
            //check password
            if (Hash::check($request->password, $userInfo->password)) {
                    $request->session()->put('adminLogged', $userInfo->id);
                    return redirect(route('a_dash'));
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }
    }

    //user check login
    public function u_check(Request $request)
    {
        //validate request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $userInfo = User::where('email', '=', $request->email)->first();
        if (!$userInfo) {
            return back()->with('fail', 'We do not recognize your email address!');
        } else {
            //check password
            if (Hash::check($request->password, $userInfo->password)) {
                if ($userInfo->email_verified_at == "") {
                    $data = Crypt::encrypt($userInfo->id);
                    return redirect(route('u_verify', $data));
                } elseif($userInfo->stat == 0){
                    return back()->with('fail','You have been blocked by the Administrator.For more Info visit our how to use page or mail us');
                }else {
                    $request->session()->put('LoggedUser', $userInfo->id);
                    $device = request()->userAgent();
                    $login = new loginhistory;
                    $login->u_id = $userInfo->id;
                    $login->device = $device;
                    $login->save();
                    return redirect('user_dashboard');
                }
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }
    }
    //user check code
    public function u_checkcode(Request $request)
    {
        //validate request
        $request->validate([
            'code' => 'required',
        ]);
        $userInfo = User::where('email', '=', $request->email)->first();
        $verify_info = VerifyUser::where('user_email', '=', $request->email)->first();

        if ($verify_info->code == $request->code) {
            $date = Carbon::now();
            //Get date and time
            $date->toDateTimeString();
            $userInfo->email_verified_at = $date;
            $save = $userInfo->save();
            if ($save) {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('user_dashboard');
            } else {
                return back()->with('fail', 'Something went wrong!');
            }
        } else {
            return back()->with('fail', 'Wrong code inputed!');
        }
    }
    //user logout
    public function u_logout()
    {
        //if session is in use
        if (session()->has('LoggedUser')) {
            //user pull and reutrn home page
            session()->pull('LoggedUser');
            return redirect('home');
        }
    }
    public function u_cp(Request $request)
    {
        $request->validate([
            'currentpass' => 'required|min:6',
            'newpass' => 'required|min:6',
            'cpass' => 'required|min:6',
        ]);

        $user = User::find($request->id);

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

    public function validatelogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect(route('u_dash'));
        }
    }
}
