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
        Schema::create('ai_predictions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade');
            $table->foreignId('regency_id')->constrained('regency')->onDelete('cascade');
            $table->foreignId('alert_id')->constrained('alerts')->onDelete('cascade');
            $table->string('nama_model');
            $table->string('tipe_prediksi');
            $table->date('tanggal_prediksi');
            $table->decimal('nilai_prediksi', 12, 2);
            $table->decimal('skor_kepercayaan', 5, 2)->nullable();
            $table->string('fitur_input')->nullable();
            $table->string('versi_model');
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_predictions');
    }
};
