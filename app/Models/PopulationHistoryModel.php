<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopulationHistoryModel extends Model
{
    protected $table = "population_history";
    protected $fillable = [
        'jumlah_penduduk',
        'tanggal_pencatatan',
        'sumber_data',
        'migrasi_masuk',
        'migrasi_keluar',
        'pertumbuhan_alamiah',
        'province_id',
    ];

    protected $casts = [
        'tanggal_pencatatan' => 'date',
    ];

    public function provinces(){
        return $this->belongsTo(ProvincesModel::class);
    }
}
