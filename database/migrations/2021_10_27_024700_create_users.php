<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by');
            $table->timestamp('created_at');
            $table->foreignId('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreignId('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('nama_pasien');
            $table->string('no_mr')->unique();
            $table->string('no_identitas');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('email');
            $table->string('tgl_lahir');
            $table->string('tempat_lahir');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by');
            $table->timestamp('created_at');
            $table->foreignId('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreignId('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamp('last_update_pass');
        });

        Schema::create('klinik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by');
            $table->timestamp('created_at');
            $table->foreignId('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreignId('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('nama_klinik');
        });

        Schema::create('modul', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by');
            $table->timestamp('created_at');
            $table->foreignId('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreignId('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('nama_modul');
            $table->string('urutan');
        });

        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by');
            $table->timestamp('created_at');
            $table->foreignId('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreignId('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('nama_menu');
            $table->string('nama_route');
            $table->foreignId('modul_id');
            $table->string('urutan');
        });

        Schema::create('hak_akses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by');
            $table->timestamp('created_at');
            $table->foreignId('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreignId('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('menu_id');
        });

        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by');
            $table->timestamp('created_at');
            $table->foreignId('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreignId('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('nama_dokter');
            $table->foreignId('user_id');
        });

        Schema::create('jadwal_dokter', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by');
            $table->timestamp('created_at');
            $table->foreignId('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreignId('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('hari');
            $table->foreignId('kuota');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->foreignId('dokter_id');
            $table->foreignId('klinik_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
        Schema::dropIfExists('users');
        Schema::dropIfExists('klinik');
        Schema::dropIfExists('hak_akses');
        Schema::dropIfExists('dokter');
        Schema::dropIfExists('jadwal_dokter');
        Schema::dropIfExists('modul');
        Schema::dropIfExists('menu');
    }
}
