<?php

namespace Database\Seeders;

use App\Models\ProvincesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProvincesModel::create([   
                'nama' => 'Jawa Tengah',
                'kode' => 'JT',
                'luas_km2' => 32800,
                'jumlah_penduduk_sekarang' => 35000000,
                'kapasitas_maks' => 40000000,
                'status' => 'stabil',
                'indikator_warna' => 'hijau',
                'sektor_ekonomi' => 'pertanian',
                'tingkat_pengangguran' => 5.2,
                'indeks_biaya_hidup' => 72.5,
                'skor_infrastruktur' => 80,
        ]);
    }
}
