<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('admin.login');
     }

     public function login_check(LoginRequest $request)  {
        $email    = $request-> email;
        $password = $request-> password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }else{
            return 'Wrong Data';
        }
     }


     public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
     }
}
