<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompensationSchemesModel extends Model
{
    protected $table = "compesation_schemes";
    protected $fillable = [
        'dari_province_id',
        'ke_province_id',
        'jumlah_dasar',
        'multiplier_keluarga',
        'multiplier_pendidikan',
        'multiplier_skill',
        'multiplier_jarak',
        'kondisi',
        'is_aktif',
        'berlaku_dari',
        'berlaku_sampai',
    ];

    public function dariProvince()
    {
        return $this->belongsTo(ProvincesModel::class, 'dari_province_id');
    }

    public function keProvince()
    {
        return $this->belongsTo(ProvincesModel::class, 'ke_province_id');
    }

}
