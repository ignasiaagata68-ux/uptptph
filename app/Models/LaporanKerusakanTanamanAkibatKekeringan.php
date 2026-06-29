<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKerusakanTanamanAkibatKekeringan extends Model
{
    protected $table =
        'laporan_kerusakan_tanaman_akibat_kekeringan';

    protected $primaryKey =
        'id_laporan_kerusakan_tanaman_akibat_kekeringan';

    public $timestamps = false;

    protected $guarded = [];
}