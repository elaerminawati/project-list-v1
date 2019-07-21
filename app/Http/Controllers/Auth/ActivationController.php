<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ActivationController extends Controller
{
    public function activate(Request $req){
        $user = User::where('email', $req->email)->first();
        if(!empty($user)){
            if($user->evc == 1){
                return redirect()->route('login')->withSuccess('Your account have been activated');
            }else{
                if($req->token == $user->evc_token){
                    $user->update([
                        'evc' => true,
                        'evc_token' => null
                    ]);
                    return redirect()->route('login')->withSuccess("Congratulations! Your account ready to use don't forget to fill github_token for see your repository");
                }
            }
        }else{
            return redirect()->route('login');
        }
    }
}
