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
        Schema::create('job_opportunities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade');
            $table->string('judul');
            $table->string('perusahaan');
            $table->string('sektor');
            $table->text('deskripsi');
            $table->text('persyaratan');
            $table->decimal('gaji_min', 12,2);
            $table->decimal('gaji_maks', 12,2);
            $table->string('jenis_pekerjaan');
            $table->string('pengalaman');
            $table->string('pendidikan');
            $table->integer('jml_posisi_tersedia');
            $table->string('kontak');
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_opportunities');
    }
};
