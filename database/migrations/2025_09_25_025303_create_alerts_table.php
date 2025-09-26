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
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('acknowledged_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade');
            $table->string('tipe_alert');
            $table->enum('tingkat_keparahan', ['rendah', 'sedang', 'tinggi', 'darurat']);
            $table->string('judul');
            $table->text('pesan');
            $table->decimal('nilai_ambang_batas', 12, 2)->nullable();
            $table->decimal('nilai_sekarang', 12, 2)->nullable();
            $table->date('tanggal_prediksi')->nullable();
            $table->boolean('is_aktif')->default(true);
            $table->date('terselesaikan_pada')->nullable();
            $table->timestamps();        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alerts');
    }
};
