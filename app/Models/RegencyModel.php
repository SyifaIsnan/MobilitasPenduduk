<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegencyModel extends Model
{
protected $table = "regency";
    protected $fillable = [
        'nama',
        'kode', 
        'luas_km2', 
        'jumlah_penduduk_sekarang', 
        'kapasitas_maks', 
        'status', 
        'indikator_warna', 
        'sektor_ekonomi', 
        'tingkat_pengangguran',
        'indeks_biaya_hidup', 
        'skor_infrastruktur'
    ];

    public function provinces(){
        return $this->belongsTo(ProvincesModel::class);
    }
}