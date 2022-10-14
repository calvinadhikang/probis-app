<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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
        if($request['username'] == 'admin'){
            // return redirect()->to('/home');
            Session::put('isAdmin', true);
        }
        else{
            // return back();
            Session::put('isAdmin', false);
        }
        return redirect('/home');
    }
}
