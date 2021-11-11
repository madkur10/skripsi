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
        DB::table('users')->insert([
            'created_by' => 1,
            'created_at' => now(),
            'fullname' => 'Muhammad Kurniawan',
            'username' => 'admin',
            'password' => '123456',
            'profesi_id' => '1'
        ]);
    }
}
