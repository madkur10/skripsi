<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pasien extends Migration
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
            $table->string('no_mr')->nullable()->unique();
            $table->string('no_identitas');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('email');
            $table->string('tgl_lahir');
            $table->string('tempat_lahir');
            $table->string('jenis_kelamin');
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
    }
}
