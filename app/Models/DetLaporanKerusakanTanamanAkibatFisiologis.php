<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetLaporanKerusakanTanamanAkibatFisiologis extends Model
{
    protected $table =
        'det_laporan_kerusakan_tanaman_akibat_fisiologis';

    protected $primaryKey =
        'id_det_laporan_kerusakan_tanaman_akibat_fisiologis';

    public $timestamps = false;

    protected $fillable = [

        'id_laporan_kerusakan_tanaman_akibat_fisiologis',

        'id_tahun',
        'id_bulan',
        'id_periode',

        'id_kabupaten_kota',
        'id_kecamatan',
        'id_desa',
        'id_komoditas',

        'varietas',
        'umur',
        'luas_tanam',
        'luas_waspada',

        'sps_ringan',
        'sps_sedang',
        'sps_berat',
        'sps_puso',
        'sps_pulih',
        'sps_jumlah',

        'luas_tambah_ringan',
        'luas_tambah_sedang',
        'luas_tambah_berat',
        'luas_tambah_puso',
        'luas_tambah_jumlah',

        'luas_keadaan_ringan',
        'luas_keadaan_sedang',
        'luas_keadaan_berat',
        'luas_keadaan_puso',
        'luas_keadaan_jumlah',

        'penanganan_upaya',
        'penanganan_luas',

        'latitude',
        'longitude',

        'status_verifikasi',
        'keterangan_verifikasi',
        'verified_by',
        'verified_at'
    ];
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