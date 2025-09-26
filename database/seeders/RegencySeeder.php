<?php

namespace Database\Seeders;

use App\Models\RegencyModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RegencyModel::create([
            'province_id' => 1, 
            'nama' => 'Semarang',
            'kode' => 'SMG',
            'luas_km2' => 373,
            'jumlah_penduduk_sekarang' => 1800000,
            'kapasitas_maks' => 2000000,
            'status' => 'stabil',
            'sektor_ekonomi' => 'perdagangan',
            'tingkat_pengangguran' => 6.1,
            'indeks_biaya_hidup' => 78.4,
            'skor_infrastruktur' => 82,
        ]);
    }
}
