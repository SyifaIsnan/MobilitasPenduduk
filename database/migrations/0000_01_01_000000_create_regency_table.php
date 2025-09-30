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
        Schema::create('regency', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade');
            $table->string('nama');
            $table->string('kode');
            $table->integer('luas_km2');
            $table->integer('jumlah_penduduk_sekarang');
            $table->integer('kapasitas_maks');
            $table->string('status');
            $table->string('sektor_ekonomi');
            $table->double('tingkat_pengangguran');
            $table->float('indeks_biaya_hidup');
            $table->integer('skor_infrastruktur');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regency');
    }
};
