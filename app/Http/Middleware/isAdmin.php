<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Auth;
use Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $check_role = DB::table("users")
                      ->join("roles", "users.role_id", "roles.id")
                      ->where([
                          ["users.id", Auth::id()]
                      ])
                      ->select("roles.name")
                      ->first();
        if($check_role->name == "Admin"){
            return $next($request);
        }else{
            return abort(404, "Oopss!! Pages Not Found");
        }
        
    }
}
