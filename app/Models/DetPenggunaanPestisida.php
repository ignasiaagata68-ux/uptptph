<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetPenggunaanPestisida extends Model
{
    protected $table = 'det_penggunaan_pestisida';

    protected $primaryKey = 'id_det_penggunaan_pestisida';

    public $timestamps = false;

    protected $fillable = [

        'id_penggunaan_pestisida',

        'no',

        'lokasi_wilkel_desa',

        'jenis_dan_formulasi',

        'penggunaan',

        'volume_semprot',

        'jenis_tanaman',

        'opt_sasaran',

        'opt_non_sasaran',

        'lingkungan_hayati',

        'jumlah_korban',

        'sebab',

        'ket',

        'status_verifikasi',

        'keterangan_verifikasi',

        'verified_by',

        'verified_at'

    ];

    public function header()
    {
        return $this->belongsTo(
            PenggunaanPestisida::class,
            'id_penggunaan_pestisida'
        );
    }
}