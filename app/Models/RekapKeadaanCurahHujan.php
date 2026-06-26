<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapKeadaanCurahHujan extends Model
{
    protected $table = 'rekap_keadaan_curah_hujan';

    protected $primaryKey = 'id_rekap_curah_hujan';

    public $timestamps = false;

    protected $fillable = [

        'id_det_keadaan_curah_hujan',

        'jumlah_ch',

        'jumlah_hh',

        'deret_hari_kering',

        'deret_hari_basah',

        'ch_max'

    ];

    public function detail()
    {
        return $this->belongsTo(
            DetKeadaanCurahHujan::class,
            'id_det_keadaan_curah_hujan'
        );
    }
}