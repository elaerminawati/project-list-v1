<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginActivitiesController extends Controller
{
    public function __costruct(){
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    public function index(){
        $data_login_activities = DB::table('login_activities')
                                 ->join('users','users.id', 'login_activities.user_id')->get();
        return view('loginActivities', ['dataloginactivities' => $data_login_activities]);
    }
}
