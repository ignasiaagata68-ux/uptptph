<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeadaanOptPadaPetakPengamatanTetap extends Model
{
    protected $table =
        'keadaan_opt_pada_petak_pengamatan_tetap';

    protected $primaryKey =
        'id_keadaan_opt_pada_petak_pengamatan_tetap';

    public $timestamps = false;

    protected $guarded = [];
    public function kecamatan()
    {
        return $this->belongsTo(
            Kecamatan::class,
            'id_kecamatan',
            'id_kecamatan'
        );
    }
}