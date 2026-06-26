<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetPengamatanPenyebaranDanPerkembanganSiputMurbey extends Model
{
    protected $table =
        'det_pengamatan_penyebaran_dan_perkembangan_siput_murbey';

    protected $primaryKey =
        'id_det_pengamatan_penyebaran_dan_perkembangan_siput_murbey';

    public $timestamps = false;

    protected $guarded = [];

    public function desa()
    {
        return $this->belongsTo(
            Desa::class,
            'id_desa'
        );
    }

    public function header()
    {
        return $this->belongsTo(
            PengamatanPenyebaranDanPerkembanganSiputMurbey::class,
            'id_pengamatan_penyebaran_dan_perkembangan_siput_murbey'
        );
    }
}