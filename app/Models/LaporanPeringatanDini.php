<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPeringatanDini extends Model
{
    protected $table =
        'laporan_peringatan_dini';

    protected $primaryKey =
        'id_laporan_peringatan_dini';

    public $timestamps = false;

    protected $guarded = [];

    public function detail()
    {
        return $this->hasMany(
            DetLaporanPeringatanDini::class,
            'id_laporan_peringatan_dini',
            'id_laporan_peringatan_dini'
        );
    }

    public function kabupaten()
    {
        return $this->belongsTo(
            KabupatenKota::class,
            'id_kabupaten_kota'
        );
    }

    public function kecamatan()
    {
        return $this->belongsTo(
            Kecamatan::class,
            'id_kecamatan'
        );
    }

    public function periode()
    {
        return $this->belongsTo(
            Periode::class,
            'id_periode'
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