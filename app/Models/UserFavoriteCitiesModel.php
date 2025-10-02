<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFavoriteCitiesModel extends Model
{
    protected $table = "user_favorite_cities";
    protected $fillable = [
        'user_id',
        'regency_id',
        'province_id',
        'tagar_id',
        'catatan',

    ] ;

    public function user(){
        return $this->hasMany(User::class);
    }

    public function regency(){
        return $this->hasMany(RegencyModel::class);
    }

    public function tagar(){
        return $this->hasMany(TagarModel::class);
    }
}
