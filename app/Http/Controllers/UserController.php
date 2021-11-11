<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function list()
    {
        $title          = "Daftar Pengguna";
        $menu_aktif     = "administrator";
        $sub_menu_aktif = "pengguna";
        $users = DB::table('users')->where('deleted_by', '=', null)->get();

        return view('list_users', [
            'title' => $title,
            'menu_aktif' => $menu_aktif,
            'sub_menu_aktif' => $sub_menu_aktif,
            'list_pengguna' => $users
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|min:4|max:50',
            'user_name' => 'required|min:4|max:20',
            'password' => 'required|min:4',
            'profesi_id' => 'required',
        ]);

        $user_id = Auth::id();

        $nama_lengkap   = $validated['nama_lengkap'];
        $username       = $validated['user_name'];
        $password       = $validated['password'];
        $profesi_id     = $validated['profesi_id'];
        $user = User::create([
            'created_by' => $user_id,
            'fullname' => $nama_lengkap,
            'username' => $username,
            'password' => $password,
            'profesi_id' => $profesi_id,
        ]);

        return redirect()->route('users.list');
    }
}
