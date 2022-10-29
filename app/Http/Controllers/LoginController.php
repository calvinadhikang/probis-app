<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
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
        $data = Karyawan::all();

        foreach ($data as $key => $value) {
            if ($value->username == $request->username && $value->password == $request->password) {
                if ($value->jabatan == 0) {
                    # code...
                    Session::put('isAdmin', true);
                }else{
                    Session::put('isAdmin', false);
                }

                return redirect('/home');
            }
        }

        return back()->with('type', 'danger')->with('msg', 'User tidak ditemukan');
    }
}
