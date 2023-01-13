<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Klinik;
use App\Models\Jadwaldokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwaldokterController extends Controller
{
    public function list()
    {
        $title          = "Daftar Menu";
        $menu_aktif     = "administrator";
        $sub_menu_aktif = "jadwal_dokter";
        $jadwaldokter = Jadwaldokter::select('jadwal_dokter.id', 'hari', 'kuota', 'jam_mulai', 'jam_selesai', 'jadwal_dokter.dokter_id', 'jadwal_dokter.klinik_id', 'dokter.nama_dokter', 'klinik.nama_klinik')->whereNull('jadwal_dokter.deleted_by')->join('dokter', 'jadwal_dokter.dokter_id', '=', 'dokter.id')->join('klinik', 'jadwal_dokter.klinik_id', '=', 'klinik.id')->get();

        $klinik = Klinik::whereNull('deleted_by')->get();
        $dokter = Dokter::whereNull('deleted_by')->get();

        return view('list_jadwal_dokter', 
                    [
                        'title' => $title,
                        'menu_aktif' => $menu_aktif,
                        'sub_menu_aktif' => $sub_menu_aktif,
                        'list_jadwal_dokter' => $jadwaldokter,
                        'list_klinik' => $klinik,
                        'list_dokter' => $dokter,
                    ]
                );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dokter_id' => 'required',
            'klinik_id' => 'required',
            'hari' => 'required',
            'kuota' => 'numeric',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $user_id_session = Auth::id();

        $dokter_id = $validated['dokter_id'];
        $klinik_id = $validated['klinik_id'];
        $hari = $validated['hari'];
        $kuota = $validated['kuota'];
        $jam_mulai = $validated['jam_mulai'];
        $jam_selesai = $validated['jam_selesai'];

        $jadwaldokter = Jadwaldokter::create([
            'created_by'    => $user_id_session,
            'created_at'    => now(),
            'dokter_id'     => $dokter_id,
            'klinik_id'     => $klinik_id,
            'hari'          => $hari,
            'kuota'         => $kuota,
            'jam_mulai'     => $jam_mulai,
            'jam_selesai'   => $jam_selesai,
        ]);

        return redirect()->route('jadwaldokter.list');
    }
}
