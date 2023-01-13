<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Klinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function list()
    {
        $title          = "Daftar Menu";
        $menu_aktif     = "administrator";
        $sub_menu_aktif = "dokter";
        $dokter = Dokter::select('dokter.id', 'dokter.klinik_id', 'nama_dokter', 'dokter.user_id', 'klinik.nama_klinik')->whereNull('dokter.deleted_by')->join('klinik', 'dokter.klinik_id', '=', 'klinik.id')->get();;
        $users = User::whereNull('deleted_by')->get();
        $klinik = Klinik::whereNull('deleted_by')->get();

        return view('list_dokter', [
            'title' => $title,
            'menu_aktif' => $menu_aktif,
            'sub_menu_aktif' => $sub_menu_aktif,
            'list_dokter' => $dokter,
            'list_users' => $users,
            'list_klinik' => $klinik
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'klinik_id' => 'required',
            'nama_dokter' => 'required|min:5',
        ]);

        $user_id_session = Auth::id();


        $user_id        = $validated['user_id'];
        $klinik_id      = $validated['klinik_id'];
        $nama_dokter     = $validated['nama_dokter'];

        $dokter = Dokter::create([
            'created_by'    => $user_id_session,
            'created_at'    => now(),
            'user_id'       => $user_id,
            'klinik_id'     => $klinik_id,
            'nama_dokter'    => $nama_dokter,
        ]);

        return redirect()->route('dokter.list');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'klinik_id' => 'required',
            'nama_dokter' => 'required|min:5',
        ]);

        $user_id_session = Auth::id();

        $user_id        = $validated['user_id'];
        $klinik_id      = $validated['klinik_id'];
        $nama_dokter     = $validated['nama_dokter'];
        
        Dokter::where('id', $request->dokter_id)->update([
            'updated_by' => $user_id_session,
            'updated_at' => now(),
            'user_id'       => $user_id,
            'klinik_id'     => $klinik_id,
            'nama_dokter'    => $nama_dokter,
        ]);

        return redirect()->route('dokter.list');
    }

    public function delete(Request $request)
    {
        $user_id = Auth::id();
        
        Dokter::where('id', $request->id)->update([
            'deleted_by' => $user_id,
            'deleted_at' => now(),
        ]);

        return redirect()->route('dokter.list');
    }
}
