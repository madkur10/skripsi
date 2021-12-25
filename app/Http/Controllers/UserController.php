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
        ]);

        $user_id = Auth::id();

        $nama_lengkap   = $validated['nama_lengkap'];
        $username       = $validated['user_name'];
        $password       = md5($validated['password']);
        $user = User::create([
            'created_by' => $user_id,
            'fullname' => $nama_lengkap,
            'username' => $username,
            'password' => $password,
            'last_update_pass' => now(),
        ]);

        return redirect()->route('users.list');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|min:4',
            'username' => 'required|min:4|max:20',
            'password' => 'required|min:4',
        ]);

        $user_id = Auth::id();

        $nama_lengkap     = $validated['nama_lengkap'];
        $username         = $validated['username'];
        $password         = md5($validated['password']);
        
        User::where('id', $request->user_id)->update([
            'updated_by' => $user_id,
            'updated_at' => now(),
            'fullname' => $nama_lengkap,
            'username' => $username,
            'password' => $password,
            'last_update_pass' => now()
        ]);

        return redirect()->route('users.list');
    }

    public function delete(Request $request)
    {
        $user_id = Auth::id();
        
        User::where('id', $request->id)->update([
            'deleted_by' => $user_id,
            'deleted_at' => now(),
        ]);

        return redirect()->route('users.list');
    }
}
