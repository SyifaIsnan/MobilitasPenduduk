<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOpportunitiesModel extends Model
{
    protected $table = "job_opportunities";
    protected $fillable = [
        'province_id',
        'judul',
        'perusahaan',
        'sektor',
        'deskripsi',
        'persyaratan',
        'gaji_min',
        'gaji_maks',
        'jenis_pekerjaan',
        'pengalaman',
        'pendidikan',
        'jml_posisi_tersedia',
        'kontak',
        'aktif',
    ];

    public function province()
    {
        return $this->belongsTo(ProvincesModel::class);
    }
}
