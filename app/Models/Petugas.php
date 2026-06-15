<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';

    protected $primaryKey = 'id_petugas';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'NIP',
        'alamat',
        'no_tlp',
        'id_user',
        'id_kecamatan'
    ];

    public function user()
    {
        return $this->belongsTo(
            UserAplikasi::class,
            'id_user',
            'id_petugas'
        );
    }

    public function kecamatan()
    {
        return $this->belongsTo(
            Kecamatan::class,
            'id_kecamatan',
            'id_kecamatan'
        );
    }
}