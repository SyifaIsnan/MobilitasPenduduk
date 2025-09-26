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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('kata_sandi');
            $table->string('nama_lengkap');
            $table->string('telepon');
            $table->enum('role', ['user', 'admin_pusat', 'admin_daerah', 'admin_kabupaten'])->default('user');
            $table->string('nik');
            $table->integer('umur');
            $table->string('jenis_kelamin');
            $table->string('pendidikan');
            $table->string('profesi');
            $table->string('keahlian');
            $table->string('status_perkawinan');
            $table->integer('jumlah_anggota_keluarga');
            $table->boolean('aktif')->default(true);
            $table->date('login_terakhir')->nullable();
            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade');
            $table->foreignId('regency_id')->constrained('regency')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at');
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->index();
            $table->string('ip_address', 45);
            $table->text('user_agent');
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
