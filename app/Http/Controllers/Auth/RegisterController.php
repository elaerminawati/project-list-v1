<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Jobs\SendEmailJob;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    //show registration form
    public function ShowRegistrationForm(){
        return view('Auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $getRole = DB::table('roles')->where([['name', 'User']]);
        if($getRole->get()->count() > 0){
            $role = $getRole->first()->id;
            //create user
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role_id' => $role,
                'evc' => true,
                'evc_token' => str_random(50)
            ]);
            DB::table('project_lists')->insert([
                ['user_id' => $user->id, 'git_email' => $data['email'], 'git_link' => "", 'git_password' => "", 'git_token' => "", 'git_status' => '0']
            ]);
        }else{
            $user = null;
        }

        return $user;
    }

    //for all register action
    public function register(Request $req){
        $this->validator($req->all())->validate();

        event(new Registered($user = $this->create($req->all())));

        return $this->registered($req, $user, null)
        ?: redirect($this->redirectPath());
    }

    //for send email then redirect to route login
    protected function registered(Request $req, $user){
        SendEmailJob::dispatch($user);
        $message = "We've sent a verification link to your email";
        return redirect()->route('login')->withSuccess($message)->with('user', $user);
    }
}
