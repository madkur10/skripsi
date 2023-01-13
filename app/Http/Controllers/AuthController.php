<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hak_akses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login', [
            'title' => "Login"
        ]);
    }

    public function loginAction(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|min:4|max:20',
            'password' => 'required|min:4',
        ]);

        $user       = $validated['username'];
        $password   = $validated['password'];
        $users      = User::where('username', $user)->where('password', $password)->first();

        if (!empty($users)) {
            $user_id = $users->id;
            Auth::loginUsingId($user_id);

            return redirect()->route('homepage')->with('valid', 'Berhasil Login');
        } else {
            return redirect()->route('login')->with('invalid', 'Username & Password Tidak Sesuai!');
        }
    }

    public function registrasi()
    {
        $title          = "Registrasi";
        return view('registrasi', [
            'title' => $title
        ]);
    }

    public function home()
    {
        $title          = "Home";
        $menu_aktif     = "";
        $sub_menu_aktif = "";

        return view('home', [
            'title' => $title,
            'menu_aktif' => $menu_aktif,
            'sub_menu_aktif' => $sub_menu_aktif
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('homepage');
    }
}
