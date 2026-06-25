<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetLaporanKerusakanTanamanAkibatBencanaAlam extends Model
{
    protected $table =
        'det_laporan_kerusakan_tanaman_akibat_bencana_alam';

    protected $primaryKey =
        'id_det_laporan_kerusakan_tanaman_akibat_bencana_alam';

    public $timestamps = false;

    protected $fillable = [

        'id_laporan_kerusakan_tanaman_akibat_bencana_alam',

        'id_tahun',
        'id_bulan',
        'id_periode',

        'id_kabupaten_kota',
        'id_kecamatan',

        'id_desa',
        'id_komoditas',

        'var',
        'umr',

        'lst',
        'was',

        'lsrt',
        'k_s',

        'lpso',
        'k_p',

        'lt_t',
        'lt_p',

        'lk_t',
        'lk_p',

        'upy',
        'j_upy',

        'lat',
        'long',

        'status_verifikasi',
        'keterangan_verifikasi',
        'verified_by',
        'verified_at'
    ];

    public function header()
    {
        return $this->belongsTo(
            LaporanKerusakanTanamanAkibatBencanaAlam::class,
            'id_laporan_kerusakan_tanaman_akibat_bencana_alam',
            'id_laporan_kerusakan_tanaman_akibat_bencana_alam'
        );
    }

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