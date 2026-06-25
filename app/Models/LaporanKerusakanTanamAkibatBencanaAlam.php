<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKerusakanTanamanAkibatBencanaAlam extends Model
{
    protected $table =
        'laporan_kerusakan_tanaman_akibat_bencana_alam';

    protected $primaryKey =
        'id_laporan_kerusakan_tanaman_akibat_bencana_alam';

    public $timestamps = false;

    protected $fillable = [

        'id_kabupaten_kota',
        'id_kecamatan',
        'id_periode',
        'id_musim_tanam'

    ];

    public function kabupaten()
    {
        return $this->belongsTo(
            KabupatenKota::class,
            'id_kabupaten_kota',
            'id_kabupaten_kota'
        );
    }

    public function kecamatan()
    {
        return $this->belongsTo(
            Kecamatan::class,
            'id_kecamatan',
            'id_kecamatan'
        );
    }

    public function periode()
    {
        return $this->belongsTo(
            Periode::class,
            'id_periode',
            'id_periode'
        );
    }

    public function musimTanam()
    {
        return $this->belongsTo(
            MusimTanam::class,
            'id_musim_tanam',
            'id_musim_tanam'
        );
    }

    public function detail()
    {
        return $this->hasMany(
            DetLaporanKerusakanTanamanAkibatBencanaAlam::class,
            'id_laporan_kerusakan_tanaman_akibat_bencana_alam',
            'id_laporan_kerusakan_tanaman_akibat_bencana_alam'
        );
    }
}