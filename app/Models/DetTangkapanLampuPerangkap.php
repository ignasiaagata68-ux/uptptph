<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetTangkapanLampuPerangkap extends Model
{
    protected $table = 'det_tangkapan_lampu_perangkap';

    protected $primaryKey = 'id_det_tangkapan_lampu_perangkap';

    public $timestamps = false;

    protected $fillable = [

        'id_tangkapan_lampu_perangkap',

        'penggerek_batang_padi_kn',
        'penggerek_batang_padi_pt',

        'wereng_ck',
        'wereng_pp',
        'wereng_daun_vn',
        'wereng_daun_nn',

        'ganjur',

        'kepinding_tanah',

        'walang_sangit',

        'musuh_alami1',
        'musuh_alami2',
        'musuh_alami3',
        'musuh_alami4',

        'status_verifikasi',
        'keterangan_verifikasi',
        'verified_by',
        'verified_at'
    ];

    public function header()
    {
        return $this->belongsTo(
            TangkapanLampuPerangkap::class,
            'id_tangkapan_lampu_perangkap',
            'id_tangkapan_lampu_perangkap'
        );
    }
}