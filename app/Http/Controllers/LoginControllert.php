<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginControllert extends Controller
{
    public function login(){
        return view('login');
    }
    public function postLogin(Request $request) {
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/home');
        }
        return redirect('/login');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
