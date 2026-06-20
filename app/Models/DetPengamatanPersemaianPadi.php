<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetPengamatanPersemaianPadi extends Model
{
    protected $table =
        'det_pengamatan_persemaian_padi';

    protected $primaryKey =
        'id_det_pengamatan_persemaian_padi';

    public $timestamps = false;

    protected $fillable = [

        'id_pengamatan_persemaian_padi',
        'no_persemaian',
        'luas',
        'umur',
        'varietas',
        'pop_ayunan_wbc',
        'wdh',
        'id_ma',
        'pop_kt_pbp',
        'tikus',
        'pbp',
        'penyakit',
        'wbc',

        'status_verifikasi',
        'keterangan_verifikasi',
        'verified_by',
        'verified_at'

    ];
}