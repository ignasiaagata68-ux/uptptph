<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\KabupatenKota;
use App\Models\Petugas;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\kelompokTani;


class PengamatanPersemaianPadi extends Model
{
    protected $table = 'pengamatan_persemaian_padi';

    protected $primaryKey =
        'id_pengamatan_persemaian_padi';

    public $timestamps = false;

    protected $fillable = [
        'id_kabupaten_kota',
        'id_kecamatan',
        'id_desa',
        'petak_pengamatan',
        'id_kelompok_tani',
        'tgl_pengamatan',
        'id_petugas'
    ];

    // Kabupaten
    public function kabupaten()
    {
        return $this->belongsTo(
            KabupatenKota::class,
            'id_kabupaten_kota',
            'id_kabupaten_kota'
        );
    }
    

    // Kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(
            Kecamatan::class,
            'id_kecamatan',
            'id_kecamatan'
        );
    }

    // Desa
    public function desa()
    {
        return $this->belongsTo(
            Desa::class,
            'id_desa',
            'id_desa'
        );
    }

    // Kelompok Tani
    public function kelompokTani()
    {
        return $this->belongsTo(
            KelompokTani::class,
            'id_kelompok_tani',
            'id_kelompok_tani'
        );
    }

    // Petugas
    public function petugas()
    {
        return $this->belongsTo(
            Petugas::class,
            'id_petugas',
            'id_petugas'
        );
    }

    // Detail Pengamatan
    public function detail()
    {
        return $this->hasMany(
            DetPengamatanPersemaianPadi::class,
            'id_pengamatan_persemaian_padi',
            'id_pengamatan_persemaian_padi'
        );
    }
}