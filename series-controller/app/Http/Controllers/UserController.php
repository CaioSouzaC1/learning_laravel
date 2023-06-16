<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function index()
    // {
    //     return view("user.index");
    // }


    public function create()
    {
        return view("user.create");
    }

    public function store(Request $request)
    {

        $request->validate([
            "name" => "required|min:6",
            "email" => "required|email",
            "password" => "required|min:6"
        ]);

        $data = $request->except("_token");
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        Auth::login($user);

        return to_route("series.index");
    }
}
