<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('dashboard')->with('success','User login successfully');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
}
