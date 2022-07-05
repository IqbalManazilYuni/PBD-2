<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisController extends Controller
{
    public function register(){
        return view('Registrasi');
    }
    public function postregister(Request $request){
        $user =User::create([
            'name'=>$request->name,
            'role'=>$request->role,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        
        return redirect('/home');
    }


}
