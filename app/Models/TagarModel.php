<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagarModel extends Model
{
    protected $table = "tagar";

    protected $fillable = [
        'nama_tagar',
    ];

    public function regency(){
        return $this->belongsTo(RegencyModel::class);
    }

    public function UserFavoriteCities(){
        return $this->belongsTo(UserFavoriteCitiesModel::class);
    }

    

}
