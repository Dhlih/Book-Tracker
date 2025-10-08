<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show_login()
    {
        return view("auth.login");
    }

    public function show_register()
    {
        return view("auth.register");
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email",
            "password" => "required|min:6"
        ]);

        $user = Auth::attempt($validated);

        if ($user) {
            return redirect("/books")->with("success", "Berhasil melakukan login");
        }

        // return back()->with("error", "Gagal melakukan login");
    }


    public function register(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email",
            "password" => "required|min:6"
        ]);

        $user = User::create($validated);

        if ($user) {
            return redirect("/login")->with("success", "Berhasil melakukan registrasi");
        }

        // return back()->with("error", "Gagal melakukan registrasi");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/login");
    }
}
