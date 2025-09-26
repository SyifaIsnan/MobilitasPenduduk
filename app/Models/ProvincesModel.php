<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvincesModel extends Model
{
    protected $table = "provinces";
    protected $fillable = [
        'regency_id',
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

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function regency(){
        return $this->hasMany(RegencyModel::class);
    }

    public function province(){
        return $this->hasOne(ProvincesModel::class);
    }

    public function populationHistory(){
        return $this->hasMany(PopulationHistoryModel::class);
    }

    public function migrationApplications(){
        return $this->hasMany(MigrationApplicationsModel::class);
    }

    public function compensationSchemes(){
        return $this->hasMany(CompensationSchemesModel::class);
    }

    public function migrationRecommendations(){
        return $this->hasMany(MigrationRecommendationsModel::class);
    }

    public function alerts(){
        return $this->hasMany(AlertsModel::class);
    }

    public function aiPredictions(){
        return $this->hasMany(AiPredictionsModel::class);
    }
    
}
