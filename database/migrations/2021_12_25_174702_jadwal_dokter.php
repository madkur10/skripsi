<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JadwalDokter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
        Schema::dropIfExists('jadwal_dokter');
    }
}
