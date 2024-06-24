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
        Schema::create('pesawat', function (Blueprint $table) {
            $table->id();
            $table->string('no_registrasi');
            $table->string('foto_pesawat');
            $table->string('nama_maskapai');
            $table->string('tipe_pesawat');
            $table->string('jenis_pesawat');
            $table->string('kapasitas_penumpang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesawat');
    }
};
