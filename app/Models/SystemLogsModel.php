<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemLogsModel extends Model
{
    protected $table = 'system_logs';

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'aksi',
        'jenis_entitas',
        'detail',
        'alamat_ip',
        'agen_pengguna',
        'sumber',
        'user_id',
        'entitas_id',
    ];

    /**
     * Relasi ke User (yang melakukan aksi).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function entitas()
    {
        return $this->belongsTo(User::class, 'entitas_id');
    }
}
