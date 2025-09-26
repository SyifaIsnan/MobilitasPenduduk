<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MigrationRecommendationsModel extends Model
{
    protected $table = "migration_recommendations";
    protected $fillable = [
        'rekomendasi_provinsi',
        'preferensi_pengguna',
        'algoritma_digunakan',
        'kadaluarsa_pada',
        'user_id',
    ];
    protected $casts = [
        'rekomendasi_provinsi' => 'array',
        'kadaluarsa_pada'      => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
