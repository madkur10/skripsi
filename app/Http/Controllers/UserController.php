<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $title          = "Daftar Pengguna";
        $menu_aktif     = "administrator";
        $sub_menu_aktif = "pengguna";

        return view('list_users', [
            'title' => $title,
            'menu_aktif' => $menu_aktif,
            'sub_menu_aktif' => $sub_menu_aktif
        ]);
    }
}
