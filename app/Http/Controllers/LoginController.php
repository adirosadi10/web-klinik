<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function halamanLogin()
    {
        return view('login');
    }
    public function ProsesLogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return \redirect('/dashboard');
        }
        return \redirect('/');
    }
    public function logOut()
    {
        Auth::logout();
        return \redirect('/');
    }
}
