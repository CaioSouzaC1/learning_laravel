<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view("login.index");
    }

    public function store(Request $request)
    {

        if (!Auth::attempt($request->only(["email", "password"]))) {
            return redirect()->back()->withErrors("Invalid credentials");
        }

        // if (!Auth::attempt($request->only(["email", "password"]))) {
        //     return redirect()->back()->withErrors("Invalid credentials");
        // }

        return redirect()->route("series.index");
    }


    public function destroy()
    {
        Auth::logout();
        return redirect()->route("login");
    }
}
