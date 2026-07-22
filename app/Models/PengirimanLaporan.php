<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengirimanLaporan extends Model
{
    protected $table = 'pengiriman_laporan';

    protected $primaryKey = 'id_pengiriman';

    public $timestamps = false;

    protected $fillable = [
        'id_data',
        'status',
        'komentar',
        'tanggal_kirim',
        'tanggal_verifikasi',
        'id_user_lphp',
        'is_kirim_pengelola'
    ];

    public function data()
    {
        return $this->belongsTo(
            Data::class,
            'id_data',
            'id_data'
        );
    }
}