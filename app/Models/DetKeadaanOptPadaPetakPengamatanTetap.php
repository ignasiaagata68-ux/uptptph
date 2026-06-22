<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetKeadaanOptPadaPetakPengamatanTetap extends Model
{
    protected $table =
        'det_keadaan_opt_pada_petak_pengamatan_tetap';

    protected $primaryKey =
        'id_det_keadaan_opt_pada_petak_pengamatan_tetap';

    public $timestamps = false;

    protected $guarded = [];

    public function desa()
    {
        return $this->belongsTo(
            Desa::class,
            'id_desa',
            'id_desa'
        );
    }
    public function komoditas()
    {
        return $this->belongsTo(
            Komoditas::class,
            'id_komoditas',
            'id_komoditas'
        );
    }
    public function opt()
    {
        return $this->belongsTo(
            Opt::class,
            'id_opt',
            'id_opt'
        );
    }
    public function ma()
    {
        return $this->belongsTo(
            Ma::class,
            'id_ma',
            'id_ma'
        );
    }
}