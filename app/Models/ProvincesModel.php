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

    public function provinces(){
        return $this->hasOne(User::class);
    }

    public function populationHistory(){
        return $this->hasOne(PopulationHistoryModel::class);
    }

    public function jobOpprtunities(){
        return $this->hasOne(JobOpportunitiesModel::class);
    }

    public function MigrationApplications(){
        return $this->hasMany(MigrationApplicationsModel::class);
    }

    public function CompensationSchemes(){
        return $this->hasMany(CompensationSchemesModel::class);
    }

    public function alerts(){
        return $this->hasOne(AlertsModel::class);
    }

    public function aiPredictions(){
        return $this->hasOne(AiPredictionsModel::class);
    }
}
