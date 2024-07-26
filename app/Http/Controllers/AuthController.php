<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        if ($req->isMethod("post")) {
            $data = $req->only("email", "password");

            if (Auth::attempt($data)) {
                return redirect()->route("homepage");
            } else {
                return redirect()->back()->with("msg", "login fail try again ");
            }
        }
        return view("user.login");
    }

    public function register(Request $request)
    {
        if ($request->isMethod("post")) {
            $data = $request->validate([
                'email' => 'required',
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'password' => ['required','min:8']
            ]);

            User::create($data);
            return redirect()->route("login")->with('msg1', 'User created successfully.');
        }
        return view("user.register");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }
}
