<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetLaporanPeringatanDini extends Model
{
    protected $table =
        'det_laporan_peringatan_dini';

    protected $primaryKey =
        'id_det_laporan_peringatan_dini';

    public $timestamps = false;

    protected $guarded = [];

    public function header()
    {
        return $this->belongsTo(
            LaporanPeringatanDini::class,
            'id_laporan_peringatan_dini'
        );
    }

    public function desa()
    {
        return $this->belongsTo(
            Desa::class,
            'id_desa'
        );
    }

    public function komoditas()
    {
        return $this->belongsTo(
            Komoditas::class,
            'id_komoditas'
        );
    }

    public function opt()
    {
        return $this->belongsTo(
            Opt::class,
            'id_opt'
        );
    }
}