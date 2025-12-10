<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegisterController extends Controller
{
    //
    public function showRegister(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email',
            'password'  => 'required|min:6'
        ]);

        User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        return redirect()->route('showLogin')->with('success','Your account has been created. Please login.');
    }

}
