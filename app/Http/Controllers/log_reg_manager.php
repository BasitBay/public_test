<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class log_reg_manager extends Controller
{
    //
    function register(){
        if (Auth::check()){
            return redirect(route(name:'dashboard'));
        }
        return view('register');
    }

    function login(){
        if (Auth::check()){
            return redirect(route(name:'dashboard'));
        }
        return view('login');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request -> only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route(name:'dashboard'));
        }
        return redirect(route(name:'login'))->with("error", "Invalid login details");
    }

    function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if (!$user){
            return redirect(route(name:'register'));
        }
        return redirect(route(name:'login'));
    }

    function logOut(){
        Session::flush();
        Auth::logout();
        return redirect(route(name:'login'));

    }
}
