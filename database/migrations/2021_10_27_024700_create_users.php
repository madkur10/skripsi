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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by');
            $table->timestamp('created_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('updated_by')->nullable();
            $table->timestamp('updated_time')->nullable();
            $table->foreignId('deleted_by')->nullable();
            $table->timestamp('deleted_time')->nullable();
            $table->string('fullname');
            $table->string('username');
            $table->string('password');
            $table->foreignId('profesi_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
