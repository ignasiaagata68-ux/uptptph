<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Desa;
use App\Models\Komoditas;

class DetLaporanKerusakanTanamanAkibatKekeringan extends Model
{
    protected $table =
        'det_laporan_kerusakan_tanaman_akibat_kekeringan';

    protected $primaryKey =
        'id_det_laporan_kerusakan_tanaman_akibat_kekeringan';

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
}