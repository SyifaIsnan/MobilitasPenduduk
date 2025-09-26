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
        Schema::create('population_history', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_penduduk');
            $table->date('tanggal_pencatatan');
            $table->string('sumber_data');
            $table->integer('migrasi_masuk');
            $table->integer('migrasi_keluar');
            $table->integer('pertumbuhan_alamiah');
            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade');
            $table->timestamps();        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('population_history');
    }
};
