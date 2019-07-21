<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class listUsersController extends Controller
{
    public function __costruct(){
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    public function index(){
        $data_list_users = DB::table('users')
                          ->join('project_lists','users.id', 'project_lists.user_id')
                          ->join('roles', 'roles.id', 'users.role_id')
                          ->select(DB::raw("users.name as name, users.email as email, project_lists.git_link as git_link, roles.name as role"))
                          ->get();
        $roles = DB::table('roles')
                 ->get();
        return view('listUsers', ['datalistusers' => $data_list_users, 'roles' => $roles]);
    }
}
