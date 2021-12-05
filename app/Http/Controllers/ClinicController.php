<?php

namespace App\Http\Controllers;

use App\Models\Klinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClinicController extends Controller
{
    public function list()
    {
        $title          = "Daftar Klinik";
        $menu_aktif     = "administrator";
        $sub_menu_aktif = "klinik";
        $users = DB::table('klinik')->where('deleted_by', '=', null)->get();

        return view('list_klinik', [
            'title' => $title,
            'menu_aktif' => $menu_aktif,
            'sub_menu_aktif' => $sub_menu_aktif,
            'list_pengguna' => $users
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_klinik' => 'required|min:4|max:50',
        ]);

        $user_id = Auth::id();

        $nama_klinik   = $validated['nama_klinik'];
        $klinik = Klinik::create([
            'created_by' => $user_id,
            'nama_klinik' => $nama_klinik,
        ]);

        return redirect()->route('clinic.list');
    }
}
