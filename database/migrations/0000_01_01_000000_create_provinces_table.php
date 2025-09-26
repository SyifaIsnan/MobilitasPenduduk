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
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode');
            $table->integer('luas_km2');
            $table->integer('jumlah_penduduk_sekarang');
            $table->integer('kapasitas_maks');
            $table->string('status');
            $table->string('indikator_warna');
            $table->string('sektor_ekonomi');
            $table->double('tingkat_pengangguran');
            $table->float('indeks_biaya_hidup');
            $table->integer('skor_infrastruktur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }

};
