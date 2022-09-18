<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Psy\Readline\Hoa\Console;

class LoginController extends Controller
{
    public function loginPage(){
        return view('login/login');
    }
    public function registerPage(){
        return view('login/register');
    }

    public function loginAttempt(Request $request){
        //@dd($request);
        if($request['username']){
            return redirect()->to('/home');
        }
        else{
            return back();
        }
    }
}
