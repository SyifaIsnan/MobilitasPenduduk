<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MigrationRecommendationsModel extends Model
{
    protected $table = "migration_recommendations";
    protected $fillable = [
        'rekomendasi_tempat_migrasi',
        'preferensi_pengguna',
        'algoritma_digunakan',
        'kadaluarsa_pada',
        'user_id',
    ];
    protected $casts = [
        'rekomendasi_tempat_migrasi' => 'array',
        'kadaluarsa_pada'      => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
