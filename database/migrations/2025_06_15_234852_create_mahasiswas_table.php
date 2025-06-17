<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->unsignedBigInteger('nim')->primary();
            $table->string('email_adress')->unique();
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('agama');
            $table->string('asal');
            $table->string('ttl');
            $table->text('alamat_rumah');
            $table->string('alamat_kos');
            $table->string('hobi')->nullable();
            $table->text('quotes')->nullable();
            $table->string('tempat_makan_fav')->nullable();
            $table->string('no_wa');
            $table->string('user_ig')->nullable();
            $table->string('nama_wali');
            $table->string('no_telp_wali');
            $table->string('formal_picture')->nullable();
            $table->string('non_formal_picture')->nullable();
            $table->string('formal_picture_del')->nullable();
            $table->string('non_formal_picture_del')->nullable();
            $table->integer('mdpl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
