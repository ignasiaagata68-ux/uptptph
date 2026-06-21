<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetKeadaanSeranganOptDanPengendalianDiWilayahPengamatan extends Model
{
    protected $table =
        'det_keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan';

    protected $primaryKey =
        'id_det_keadaan_serangan_opt_dan_pengendalian_di_wilayah';

    public $timestamps = false;

    protected $guarded = [];
}