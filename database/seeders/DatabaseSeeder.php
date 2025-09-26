<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'email' => 'adminpusat@example.com',
            'kata_sandi' => Hash::make('12345678'),
            'nama_lengkap' => 'Admin Pusat',
            'telepon' => '081234567890',
            'role' => 'user',
            'nik' => '1234567890123456',
            'umur' => 40,
            'jenis_kelamin' => 'Laki-laki',
            'pendidikan' => 'S2',
            'profesi' => 'Pegawai Negeri',
            'keahlian' => 'Manajemen',
            'status_perkawinan' => 'Menikah',
            'jumlah_anggota_keluarga' => 4,
            'province_id' => 1, // Jawa Tengah
            'regency_id' => 1, // Semarang
        ]);
    }
}
