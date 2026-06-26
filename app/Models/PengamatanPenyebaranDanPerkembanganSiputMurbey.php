<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengamatanPenyebaranDanPerkembanganSiputMurbey extends Model
{
    protected $table =
        'pengamatan_penyebaran_dan_perkembangan_siput_murbey';

    protected $primaryKey =
        'id_pengamatan_penyebaran_dan_perkembangan_siput_murbey';

    public $timestamps = false;

    protected $guarded = [];

    public function detail()
    {
        return $this->hasMany(
            DetPengamatanPenyebaranDanPerkembanganSiputMurbey::class,
            'id_pengamatan_penyebaran_dan_perkembangan_siput_murbey',
            'id_pengamatan_penyebaran_dan_perkembangan_siput_murbey'
        );
    }

    public function kecamatan()
    {
        return $this->belongsTo(
            Kecamatan::class,
            'id_kecamatan'
        );
    }

    public function kabupaten()
    {
        return $this->belongsTo(
            KabupatenKota::class,
            'id_kabupaten_kota'
        );
    }

    public function bulan()
    {
        return $this->belongsTo(
            Bulan::class,
            'id_bulan'
        );
    }

    public function musimTanam()
    {
        return $this->belongsTo(
            MusimTanam::class,
            'id_musim_tanam'
        );
    }
}