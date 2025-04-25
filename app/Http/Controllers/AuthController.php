<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //Views
    public function loginView()
    {
        return view("auth.login");
    }

    public function registerView()
    {
        return view("auth.register");
    }

    //Functionallity

    public function authUser(Request $req)
    {
        $validate = $req->validate(
            [
                "email" => "required|string|email",
                "password" => "required|string"
            ]
        );

        if (Auth::attempt($validate)) {
            $req->session()->regenerate();
            return redirect()->route("task.index.view");
        }

        throw ValidationException::withMessages(["userExists" => "User doesn't exist"]);
    }

    public function createUser(Request $req)
    {
        $validate = $req->validate(
            [
                "name" => "required|string|min:2|max:8",
                "email" => "required|string|email|max:32|unique:users",
                "password" => "required|string|min:2|max:24|confirmed",
                "password_confirmation" => "required|string"
            ]
        );

        User::create(
            [
                "name" => $validate["name"],
                "email" => $validate["email"],
                "password" => Hash::make($validate["password"])
            ]
        );

        return redirect()->route("login.view");
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerate();
        return redirect()->route("login.view");
    }
}
