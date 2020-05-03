<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view("login-form");
    }

    public function login(Request $request)
    {
        $creadential = $request->only("username", "password");
        if (Auth::attempt($creadential)){
            return redirect()->route("biodata.index");
        }
        else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route("login.index");
    }
}
