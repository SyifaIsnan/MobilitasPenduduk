<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $table = 'users';
    protected $fillable = [
        'email',
        'kata_sandi',
        'nama_lengkap',
        'telepon',
        'role',
        'nik',
        'umur',
        'jenis_kelamin',
        'pendidikan',
        'profesi',
        'keahlian',
        'status_perkawinan',
        'jumlah_anggota_keluarga',
        'aktif',
        'login_terakhir',
        'province_id',
        'regency_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function isUser(){
        return $this->role === 'user';
    }

    public function isAdminPusat(){
        return $this->role === 'admin_pusat';
    }

    public function isAdminDaerah(){
        return $this->role === 'admin_daerah';
    }

    public function isAdminKabupaten(){
        return $this->role == 'admin_kabupaten';
    }

    public function provinces(){
        return $this->belongsTo(ProvincesModel::class);
    }

    public function regency(){
        return $this->belongsTo(RegencyModel::class);
    }

    public function MigrationApplications(){
        return $this->hasMany(MigrationApplicationsModel::class);
    }

    public function MigrationRecommendations(){
        return $this->hasMany(MigrationRecommendationsModel::class);
    }

    public function Notifications(){
        return $this->hasMany(NotificationsModel::class);
    }

    public function Alerts(){
        return $this->hasMany(AlertsModel::class);
    }

    public function SystemLogs(){
        return $this->hasMany(SystemLogsModel::class);
    }

}
