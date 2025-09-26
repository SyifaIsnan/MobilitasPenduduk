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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('tipe');
            $table->string('judul');
            $table->text('pesan');
            $table->string('saluran');
            $table->boolean('sudah_dibaca')->default(false);
            $table->enum('prioritas', ['normal', 'penting', 'sangat penting'])->default('normal');
            $table->string('entitas_terkait');
            $table->integer('entitas_id');
            $table->date('dikirim_pada');
            $table->date('dibaca_pada');
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
