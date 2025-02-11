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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->integer('no_daftar')->unique();
            $table->integer('nisn')->unique();
            $table->integer('nik')->unique();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->integer('no_kk')->unique();
            $table->string('tempat_tanggal_lahir');
            $table->string('alamat');
            $table->string('pas_photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
