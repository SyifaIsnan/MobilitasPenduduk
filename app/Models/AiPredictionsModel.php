<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiPredictionsModel extends Model
{
    protected $table = "ai_predictions";
    protected $fillable = [
        'province_id',
        'alert_id',
        'nama_model',
        'tipe_prediksi',
        'tanggal_prediksi',
        'nilai_prediksi',
        'skor_kepercayaan',
        'fitur_input',
        'versi_model',
    ];

    protected $casts = [
        'tanggal_prediksi'   => 'date',
        'nilai_prediksi'     => 'decimal:2',
        'skor_kepercayaan'   => 'decimal:2',
    ];

    public function province()
    {
        return $this->belongsTo(ProvincesModel::class);
    }

    public function alert()
    {
        return $this->belongsTo(AlertsModel::class);
    }
}
