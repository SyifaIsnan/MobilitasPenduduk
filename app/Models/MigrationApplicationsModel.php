<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MigrationApplicationsModel extends Model
{
    protected $table = "migration_applications";
    protected $fillable = [

        'user_id',
        'disetujui_oleh',
        'status_pengajuan',
        'anggota_keluarga',
        'dokumen',
        'jumlah_kompensasi',
        'status_kompensasi',
        'tanggal_migrasi',
        'tanggal_selesai',
        'dari_province_id',
        'ke_province_id',
    ];

    protected $casts = [
        'anggota_keluarga' => 'array',
        'dokumen' => 'array',
        'tanggal_migrasi' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function disetujuiOleh()
    {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }

    public function dariProvince()
    {
        return $this->belongsTo(ProvincesModel::class, 'dari_province_id');
    }

    public function keProvince()
    {
        return $this->belongsTo(ProvincesModel::class, 'ke_province_id');
    }
}
