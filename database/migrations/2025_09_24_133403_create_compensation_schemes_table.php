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
        Schema::create('compensation_schemes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dari_province_id')->nullable()->constrained('provinces')->onDelete('cascade');
            $table->foreignId('ke_province_id')->nullable()->constrained('provinces')->onDelete('cascade');
            $table->decimal('jumlah_dasar', 12, 2);
            $table->integer('multiplier_keluarga');
            $table->integer('multiplier_pendidikan');
            $table->integer('multiplier_skill');
            $table->integer('multiplier_jarak');
            $table->string('kondisi');
            $table->boolean('is_aktif')->default(true);
            $table->date('berlaku_dari')->nullable();
            $table->date('berlaku_sampai')->nullable();
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compensation_schemes');
    }
};
