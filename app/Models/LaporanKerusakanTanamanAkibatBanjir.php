<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKerusakanTanamanAkibatBanjir extends Model
{
    protected $table =
        'laporan_kerusakan_tanaman_akibat_banjir';

    protected $primaryKey =
        'id_laporan_kerusakan_tanaman_akibat_banjir';

    public $timestamps = false;

    protected $guarded = [];
}