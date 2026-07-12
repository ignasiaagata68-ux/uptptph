<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAplikasi extends Model
{
    protected $table = 'user';

    protected $primaryKey = 'id_user';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'email',
        'role',
        'status',
        'id_lphp',
        'id_kabupaten',
        'id_kecamatan'
    ];

    // Relasi ke LPHP
    public function lphp()
    {
        return $this->belongsTo(Lphp::class, 'id_lphp', 'id_lphp');
    }

    // Relasi ke Kabupaten
    public function kabupaten()
    {
        return $this->belongsTo(KabupatenKota::class, 'id_kabupaten', 'id_kabupaten_kota');
    }

    // Relasi ke Kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }
}