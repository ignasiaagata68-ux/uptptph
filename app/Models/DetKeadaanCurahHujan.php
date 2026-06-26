<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetKeadaanCurahHujan extends Model
{
    protected $table = 'det_keadaan_curah_hujan';

    protected $primaryKey = 'id_det_keadaan_curah_hujan';

    public $timestamps = false;

    protected $fillable = [

        'id_keadaan_curah_hujan',

        'tanggal_penakaran',

        'dasiran',

        'curah_hujan_mm',

        'status_verifikasi',

        'keterangan_verifikasi',

        'verified_by',

        'verified_at'

    ];

    public function header()
    {
        return $this->belongsTo(
            KeadaanCurahHujan::class,
            'id_keadaan_curah_hujan'
        );
    }

    public function rekap()
    {
        return $this->hasOne(
            RekapKeadaanCurahHujan::class,
            'id_det_keadaan_curah_hujan',
            'id_det_keadaan_curah_hujan'
        );
    }
}