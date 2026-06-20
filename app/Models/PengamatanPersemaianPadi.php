<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengamatanPersemaianPadi extends Model
{
    protected $table = 'pengamatan_persemaian_padi';

    protected $primaryKey =
        'id_pengamatan_persemaian_padi';

    public $timestamps = false;

    protected $fillable = [
        'id_kabupaten_kota',
        'id_kecamatan',
        'id_desa',
        'petak_pengamatan',
        'id_kelompok_tani',
        'tgl_pengamatan',
        'id_petugas'
    ];
}