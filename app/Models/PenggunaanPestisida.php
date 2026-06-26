<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenggunaanPestisida extends Model
{
    protected $table = 'penggunaan_pestisida';

    protected $primaryKey = 'id_penggunaan_pestisida';

    public $timestamps = false;

    protected $fillable = [

        'id_kabupaten_kota',
        'id_kecamatan',
        'id_periode',
        'id_musim_tanam'

    ];

    public function detail()
    {
        return $this->hasMany(
            DetPenggunaanPestisida::class,
            'id_penggunaan_pestisida'
        );
    }
}