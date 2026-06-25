<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetKumulatifLuasTambahTanamPadi extends Model
{
    protected $table = 'det_kumulatif_luas_tambah_tanam_padi';

    protected $primaryKey = 'id_det_kumulatif_luas_tambah_tanam_padi';

    public $timestamps = false;

    protected $fillable = [

        'id_kumulatif_luas_tambah_tanam_padi',

        'no',

        'id_kabupaten_kota',
        'id_kecamatan',
        'id_desa',

        'total_luas_laporan_periode_lalu',

        'var1',
        'var2',
        'var3',
        'var4',
        'var5',
        'var6',
        'var7',
        'var8',
        'var9',
        'var10',

        'status_verifikasi',
        'keterangan_verifikasi',
        'verified_by',
        'verified_at'

    ];

    public function header()
    {
        return $this->belongsTo(
            KumulatifLuasTambahTanamPadi::class,
            'id_kumulatif_luas_tambah_tanam_padi',
            'id_kumulatif_luas_tambah_tanam_padi'
        );
    }

    public function desa()
    {
        return $this->belongsTo(
            Desa::class,
            'id_desa',
            'id_desa'
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

    public function kabupaten()
    {
        return $this->belongsTo(
            KabupatenKota::class,
            'id_kabupaten_kota',
            'id_kabupaten_kota'
        );
    }
}