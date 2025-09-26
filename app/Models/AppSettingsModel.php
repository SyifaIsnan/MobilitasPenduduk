<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSettingsModel extends Model
{
    protected $table = "app_settings";  
    protected $fillable = [
        'kunci',
        'nilai',
        'deskripsi',
        'kategori',
        'publik',
        'diperbarui_oleh',
    ];

    public function diperbaruiOleh()
    {
        return $this->belongsTo(User::class, 'diperbarui_oleh');
    }
}
