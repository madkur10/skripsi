<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function list()
    {
        $title          = "Daftar Menu";
        $menu_aktif     = "administrator";
        $sub_menu_aktif = "menu";
        $menu = Menu::select('menu.id', 'modul_id', 'nama_menu', 'nama_route', 'nama_modul', 'menu.urutan')->whereNull('menu.deleted_by')->join('modul', 'modul.id', '=', 'menu.modul_id')->get();
        $modul = Modul::whereNull('deleted_by')->get();

        return view('list_menu', [
            'title' => $title,
            'menu_aktif' => $menu_aktif,
            'sub_menu_aktif' => $sub_menu_aktif,
            'list_menu' => $menu,
            'list_modul' => $modul
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'modul_id' => 'required',
            'nama_menu' => 'required|min:4',
            'nama_route' => 'required',
            'urutan' => 'required|numeric'
        ]);

        $user_id = Auth::id();


        $modul_id       = $validated['modul_id'];
        $nama_menu      = $validated['nama_menu'];
        $nama_route     = $validated['nama_route'];
        $urutan         = $validated['urutan'];

        $modul = Menu::create([
            'created_by'    => $user_id,
            'created_at'    => now(),
            'modul_id'      => $modul_id,
            'nama_menu'     => $nama_menu,
            'nama_route'    => $nama_route,
            'urutan'        => $urutan
        ]);

        return redirect()->route('menu.list');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_menu' => 'required|min:4',
            'nama_route' => 'required|min:4',
            'modul_id' => 'required',
            'urutan' => 'required|numeric'
        ]);

        $user_id = Auth::id();

        $nama_menu     = $validated['nama_menu'];
        $nama_route    = $validated['nama_route'];
        $modul_id      = $validated['modul_id'];
        $urutan        = $validated['urutan'];
        
        Menu::where('id', $request->menu_id)->update([
            'updated_by' => $user_id,
            'updated_at' => now(),
            'nama_menu' => $nama_menu,
            'nama_route' => $nama_route,
            'modul_id' => $modul_id,
            'urutan' => $urutan
        ]);

        return redirect()->route('menu.list');
    }

    public function delete(Request $request)
    {
        $user_id = Auth::id();
        
        Menu::where('id', $request->id)->update([
            'deleted_by' => $user_id,
            'deleted_at' => now(),
        ]);

        return redirect()->route('menu.list');
    }
}
