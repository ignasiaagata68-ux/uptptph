<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeadaanSeranganOptDanPengendalianDiWilayahPengamatan extends Model
{
    protected $table =
        'keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan';

    protected $primaryKey =
        'id_keadaan_serangan_opt_dan_pengendalian_di_wilayah';

    public $timestamps = false;

    protected $fillable = [

        'id_kecamatan',
        'id_kabupaten_kota',
        'id_periode',
        'id_musim_tanam'

    ];
}