<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class githubSettingController extends Controller
{
    public function __constructor(){
        $this->middleware('auth');
    }

    public function index(){
        //dd(Auth::user());
        $git_data = DB::table("project_lists")->where([['user_id', Auth::id()]])->first();
        return view('githubSetting', ['gitdata' => $git_data]);
    }

    public function SaveGithubSetting(Request $req){
        $git_email = $req->git_email;
        $git_link = $req->git_link;
        $git_password = Crypt::encryptString($req->git_password);
        $git_token = Crypt::encryptString($req->git_token);
        $git_status = $req->git_status;

        //check data in table project_lists
        $check = DB::table("project_lists")->where([['user_id', Auth::id()]])->get();
        if($check->count() > 0){
            DB::table('project_lists')
                ->where('user_id', Auth::id())
                ->update([
                    'git_email' => $git_email,
                    'git_link' => $git_link,
                    'git_password' => $git_password,
                    'git_token' => $git_token,
                    'git_status' => $git_status
                ]);
        }else{
            DB::table('project_lists')->insert([
                'git_email' => $git_email,
                'git_link' => $git_link,
                'git_password' => $git_password,
                'git_token' => $git_token,
                'git_status' => $git_status,
                'user_id' => Auth::id()
                ]);
        }

        return response()->json(array('status' => 1));
    }
}
