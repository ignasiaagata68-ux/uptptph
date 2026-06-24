<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKerusakanTanamanAkibatFisiologis extends Model
{
    protected $table =
        'laporan_kerusakan_tanaman_akibat_fisiologis';

    protected $primaryKey =
        'id_laporan_kerusakan_tanaman_akibat_fisiologis';

    public $timestamps = false;

    protected $fillable = [
        'id_kabupaten_kota',
        'id_kecamatan',
        'id_periode',
        'id_musim_tanam'
    ];
}