<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulController extends Controller
{
    public function list()
    {
        $title          = "Daftar Modul";
        $menu_aktif     = "administrator";
        $sub_menu_aktif = "modul";
        $moduls = Modul::whereNull('deleted_by')->get();

        return view('list_moduls', [
            'title' => $title,
            'menu_aktif' => $menu_aktif,
            'sub_menu_aktif' => $sub_menu_aktif,
            'list_moduls' => $moduls
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_modul' => 'required|min:4',
            'urutan' => 'required|numeric'
        ]);

        $user_id = Auth::id();


        $nama_modul     = $validated['nama_modul'];
        $urutan         = $validated['urutan'];

        $urutannya = Modul::where('urutan', '>=', $urutan)->orderBy('urutan')->get();
        // dd($urutannya);
        $modul = Modul::create([
            'created_by' => $user_id,
            'created_at' => now(),
            'nama_modul' => $nama_modul,
            'urutan' => $urutan
        ]);



        foreach ($urutannya as $value) {
            $urutan++;
            Modul::where('id', $value->id)->update([
                'updated_by' => $user_id,
                'updated_at' => now(),
                'urutan' => $urutan
            ]);
        }

        return redirect()->route('modul.list');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_modul' => 'required|min:4',
            'urutan' => 'required|numeric'
        ]);

        $user_id = Auth::id();

        $nama_modul     = $validated['nama_modul'];
        $urutan         = $validated['urutan'];
        
        Modul::where('id', $request->modul_id)->update([
            'updated_by' => $user_id,
            'updated_at' => now(),
            'nama_modul' => $nama_modul,
            'urutan' => $urutan
        ]);

        return redirect()->route('modul.list');
    }

    public function delete(Request $request)
    {
        $user_id = Auth::id();
        
        Modul::where('id', $request->id)->update([
            'deleted_by' => $user_id,
            'deleted_at' => now(),
        ]);

        return redirect()->route('modul.list');
    }
}
