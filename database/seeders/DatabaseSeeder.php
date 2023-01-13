<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //default users
        DB::table('users')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'fullname' => 'Muhammad Kurniawan',
            'username' => 'admin',
            'password' => md5('123456'),
            'hak_akses_id' => 1,
            'last_update_pass' => now()
        ]);

        DB::table('users')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'fullname' => 'Test Pasien',
            'username' => 'test pasien',
            'password' => md5('123456'),
            'hak_akses_id' => 4,
            'last_update_pass' => now()
        ]);

        //default pasien
        DB::table('pasien')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_pasien' => 'Test Pasien',
            'no_mr' => '00000001',
            'no_identitas' => '12345678910',
            'alamat' => 'Jl Nusamandiri',
            'no_hp' => '08512345678',
            'email' => 'testpasien@gmail.com',
            'tgl_lahir' => '1991-09-21',
            'tempat_lahir' => 'Kuningan',
            'jenis_kelamin' => 'L',
        ]);

        //default hak akses
        DB::table('hak_akses')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_hak_akses' => 'admin'
        ]);

        DB::table('hak_akses')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_hak_akses' => 'registrasi'
        ]);

        DB::table('hak_akses')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_hak_akses' => 'kasir'
        ]);

        DB::table('hak_akses')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_hak_akses' => 'pasien'
        ]);

        //default modul
        DB::table('modul')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_modul' => 'Administrator',
            'urutan' => '1'
        ]);

        DB::table('modul')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_modul' => 'Registrasi',
            'urutan' => '2'
        ]);

        DB::table('modul')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_modul' => 'Kasir',
            'urutan' => '3'
        ]);

        DB::table('modul')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_modul' => 'Telemedisin',
            'urutan' => '4'
        ]);

        //default menu
        DB::table('menu')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_menu' => 'Pengguna',
            'nama_route' => 'users.list',
            'modul_id' => '1',
            'urutan' => '1'
        ]);

        DB::table('menu')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_menu' => 'Modul',
            'nama_route' => 'modul.list',
            'modul_id' => '1',
            'urutan' => '2'
        ]);

        DB::table('menu')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_menu' => 'Menu',
            'nama_route' => 'menu.list',
            'modul_id' => '1',
            'urutan' => '3'
        ]);

        DB::table('menu')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_menu' => 'Klinik',
            'nama_route' => 'clinic.list',
            'modul_id' => '1',
            'urutan' => '4'
        ]);

        DB::table('menu')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_menu' => 'Jadwal Dokter',
            'nama_route' => 'jadwaldokter.list',
            'modul_id' => '1',
            'urutan' => '5'
        ]);

        //default klinik
        DB::table('klinik')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_klinik' => 'Klinik Heritage Jantung',
        ]);

        DB::table('klinik')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_klinik' => 'Klinik Heritage Mata',
        ]);

        DB::table('klinik')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_klinik' => 'Klinik Heritage THT',
        ]);

        DB::table('klinik')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'nama_klinik' => 'Klinik Heritage Penyakit Dalam',
        ]);
    }
}
