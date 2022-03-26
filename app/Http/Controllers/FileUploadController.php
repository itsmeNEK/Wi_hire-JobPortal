<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\companyfiles;
use App\Models\user_file_upload;
use App\Models\Mailing;
use App\Models\User;
use App\Models\jobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'user_files' => 'required|mimes:doc,pdf,docx|max:5000'
        ]);
        $path = 'user_files/';
        $newname = Helper::renameFile($path, $request->file('user_files')->getClientOriginalName());

        $upload = $request->user_files->move(public_path($path), $newname);

        $user = new user_file_upload;
        $user->user_id = $request->userid;
        $user->file_path = $newname;
        $save = $user->save();

        if ($upload && $save) {
            return redirect(route('u_dash'));
        } elseif ($upload) {
            echo "File has been Up to resources but not in database";
        } elseif ($save) {
            echo "File has been Up to database but not in resources";
        } else {
            echo "File has not been Uploaded in both database and resources";
        }
    }
    public function u_id_upload(Request $request)
    {
        $request->validate([
            'user_files' => 'required|mimes:jpg,png,jpeg|max:5000'
        ]);
        $path = 'user_files/';
        $newname = Helper::renameFile($path, $request->file('user_files')->getClientOriginalName());

        $upload = $request->user_files->move(public_path($path), $newname);

        $user = User::find(session('LoggedUser'));
        $user->userID = $newname;
        $save = $user->save();

        if ($upload && $save) {
            return back()->with('success', 'File Uploaded');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
    public function u_id_remove(Request $request)
    {
        $user = User::find(session('LoggedUser'));
        $user->userID = null;
        $save = $user->save();

        if ($save) {
            return back();
        }
    }
    public function delete(Request $request)
    {
        $delete = DB::table('user_file_uploads')
            ->where('id', $request->id)
            ->delete();
        if ($delete) {
            return back()->with('success', 'Record Has been deleted');
        } else {
            return back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    public function user_file_view($id)
    {
        $id = crypt::decrypt($id);
        $user_file = user_file_upload::where('id', '=', $id)->first();

        // return view('users.u_view_file',compact('user_file'));
        $filename = $user_file->file_path;
        if ($filename) {
            $file = base_path() . '/public/user_files/' . $filename;
            if ($pos = strrpos($filename, '.')) {
                $ext = substr($filename, $pos);
            } else {
                $name = $filename;
            }
            if ($ext == '.pdf') {
                $content_types = 'application/pdf';
            } elseif ($ext == '.doc') {
                $content_types = 'application/msword';
            } elseif ($ext == '.docx') {
                $content_types = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
            } elseif ($ext == '.xls') {
                $content_types = 'application/vnd.ms-excel';
            } elseif ($ext == '.xlsx') {
                $content_types = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
            } elseif ($ext == '.txt') {
                $content_types = 'application/octet-stream';
            }
            return response(file_get_contents($file), 200)->header('Content-Type', $content_types);
        } else {
            exit('Invalid Request');
        }
    }

    public function mail_file_view($id)
    {
        $id = crypt::decrypt($id);
        $user_file = Mailing::where('id', '=', $id)->first();
        // return view('users.u_view_file',compact('user_file'));
        $filename = $user_file->attach;
        if ($filename) {
            $file = base_path() . '/public/mail/' . $filename;
            if ($pos = strrpos($filename, '.')) {
                $ext = substr($filename, $pos);
            } else {
                $name = $filename;
            }
            if ($ext == '.pdf') {
                $content_types = 'application/pdf';
            } elseif ($ext == '.doc') {
                $content_types = 'application/msword';
            } elseif ($ext == '.docx') {
                $content_types = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
            } elseif ($ext == '.xls') {
                $content_types = 'application/vnd.ms-excel';
            } elseif ($ext == '.xlsx') {
                $content_types = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
            } elseif ($ext == '.txt') {
                $content_types = 'application/octet-stream';
            }
            return response(file_get_contents($file), 200)->header('Content-Type', $content_types);
        } else {
            exit('Invalid Request');
        }
    }
    public function company_file_view($cid, $id)
    {
        $cid = crypt::decrypt($cid);
        $id = crypt::decrypt($id);
        $user_file = companyfiles::where('id', '=', $id)
            ->where('company_id', '=', $cid)
            ->first();
        // return view('users.u_view_file',compact('user_file'));
        $filename = $user_file->file_path;
        if ($filename) {
            $file = base_path() . '/public/company_files/' . $filename;
            if ($pos = strrpos($filename, '.')) {
                $ext = substr($filename, $pos);
            } else {
                $name = $filename;
            }
            if ($ext == '.pdf') {
                $content_types = 'application/pdf';
            } elseif ($ext == '.doc') {
                $content_types = 'application/msword';
            } elseif ($ext == '.docx') {
                $content_types = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
            } elseif ($ext == '.xls') {
                $content_types = 'application/vnd.ms-excel';
            } elseif ($ext == '.xlsx') {
                $content_types = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
            } elseif ($ext == '.txt') {
                $content_types = 'application/octet-stream';
            } elseif ($ext == '.jpg') {
                $content_types = 'image/png';
            } elseif ($ext == '.jpeg') {
                $content_types = 'image/png';
            } elseif ($ext == '.png') {
                $content_types = 'image/png';
            } else {
                return back()->with('fail', 'Invalid File');
            }
            return response(file_get_contents($file), 200)->header('Content-Type', $content_types);
        } else {
            exit('Invalid Request');
        }
    }

    public function ViewJobMemo($id)
    {
        $id = crypt::decrypt($id);
        $user_file = jobs::where('id', '=', $id)
            ->first();
        // return view('users.u_view_file',compact('user_file'));
        $filename = $user_file->memo;
        if ($filename) {
            $file = base_path() . '/public/company_files/' . $filename;
            if ($pos = strrpos($filename, '.')) {
                $ext = substr($filename, $pos);
            } else {
                $name = $filename;
            }
            if ($ext == '.pdf') {
                $content_types = 'application/pdf';
            } elseif ($ext == '.doc') {
                $content_types = 'application/msword';
            } elseif ($ext == '.docx') {
                $content_types = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
            } elseif ($ext == '.xls') {
                $content_types = 'application/vnd.ms-excel';
            } elseif ($ext == '.xlsx') {
                $content_types = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
            } elseif ($ext == '.txt') {
                $content_types = 'application/octet-stream';
            } elseif ($ext == '.jpg') {
                $content_types = 'image/png';
            } elseif ($ext == '.jpeg') {
                $content_types = 'image/png';
            } elseif ($ext == '.png') {
                $content_types = 'image/png';
            } else {
                return back()->with('fail', 'Invalid File');
            }
            return response(file_get_contents($file), 200)->header('Content-Type', $content_types);
        } else {
            return back()->with('fail', 'Invalid File');
        }
    }
}
