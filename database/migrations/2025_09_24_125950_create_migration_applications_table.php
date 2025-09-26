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
        Schema::create('migration_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('disetujui_oleh')->constrained('users')->onDelete('cascade');
            $table->enum('status_pengajuan', ['pending','disetujui','ditolak'])->default('pending');
            $table->json('anggota_keluarga'); 
            $table->json('dokumen');
            $table->decimal('jumlah_kompensasi', 12, 2);
            $table->enum('status_kompensasi', ['pending','disetujui','ditolak'])->default('pending');
            $table->date('tanggal_migrasi');
            $table->date('tanggal_selesai')->nullable();
            $table->foreignId('dari_province_id')->constrained('provinces')->onDelete('cascade');
            $table->foreignId('ke_province_id')->constrained('provinces')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('migration_applications');
    }
};
