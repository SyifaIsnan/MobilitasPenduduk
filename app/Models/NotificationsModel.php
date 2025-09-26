<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationsModel extends Model
{
    protected $table = "notifications";
    protected $fillable = [
        'user_id',
        'tipe',
        'judul',
        'pesan',
        'saluran',
        'sudah_dibaca',
        'prioritas',
        'entitas_terkait',
        'entitas_id',
        'dikirim_pada',
        'dibaca_pada',
    ];

    protected $casts = [
        'sudah_dibaca' => 'boolean',
        'dikirim_pada' => 'date',
        'dibaca_pada'  => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entitas()
    {
        return $this->belongsTo(User::class);
    }
}
