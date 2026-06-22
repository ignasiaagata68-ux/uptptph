<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetLaporanKerusakanTanamanAkibatBanjir extends Model
{
    protected $table =
        'det_laporan_kerusakan_tanaman_akibat_banjir';

    protected $primaryKey =
        'id_det_laporan_kerusakan_tanaman_akibat_banjir';

    public $timestamps = false;

    protected $guarded = [];
}