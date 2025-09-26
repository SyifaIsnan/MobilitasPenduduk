<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlertsModel extends Model
{
    protected $table = "alerts";
    protected $fillable = [
        'acknowledged_by',
        'province_id',
        'regency_id',
        'tipe_alert',
        'tingkat_keparahan',
        'judul',
        'pesan',
        'nilai_ambang_batas',
        'nilai_sekarang',
        'tanggal_prediksi',
        'is_aktif',
        'terselesaikan_pada',
    ];

    protected $casts = [
        'nilai_ambang_batas' => 'decimal:2',
        'nilai_sekarang'     => 'decimal:2',
        'tanggal_prediksi'   => 'date',
        'terselesaikan_pada' => 'date',
        'is_aktif'           => 'boolean',
    ];

    public function province()
    {
        return $this->belongsTo(ProvincesModel::class);
    }

    public function regency()
    {
        return $this->belongsTo(RegencyModel::class);
    }


    public function acknowledgedBy()
    {
        return $this->belongsTo(User::class, 'acknowledged_by');
    }

}
