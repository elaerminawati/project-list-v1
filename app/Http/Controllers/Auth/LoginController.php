<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Rules\EmailValidator;
use Illuminate\Http\Request;
use App\login_activities;
use Jenssegers\Agent\Agent;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/github-setting';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function ShowFormLogin(){
        dd(\Auth::id());
        return view('Auth.login');
    }

    protected function ValidateLogin(Request $req){
        $this->validate($req, [
            $this->username() => ['required', 'string', new EmailValidator],
            'password' => 'required|string',
        ]);
    }

    protected function authenticated(Request $req, $user){
        $agent = new Agent;
        $platform = $agent->platform();
        $version_platform = $agent->version($platform);
        if($agent->isDesktop()){
            $type = "Desktop";
        }else{
            $type = "Mobile";
        }

        $browser = $agent->browser();
        $version_browser = $agent->version($browser);

        $ip_address = \Request::getClientIp();
        $login_activities = login_activities::create([
            'user_id' => \Auth::id(),
            'ip_address' => $ip_address,
            'platform_type' => $type,
            'platform_name' => $platform,
            'platform_version' => $version_platform,
            'browser_name' => $browser,
            'browser_version' => $version_browser
        ]);
    }


}
