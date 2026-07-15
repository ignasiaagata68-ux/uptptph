<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';

    protected $primaryKey = 'id_data';

    public $timestamps = false;

    protected $fillable = [
        'id_petugas',
        'id_tahun',
        'id_bulan',
        'id_periode',
        'id_musim_tanam',
        'tanggal_laporan'
    ];

    public function petugas()
    {
        return $this->belongsTo(
            Petugas::class,
            'id_petugas',
            'id_petugas'
        );
    }

    public function tahun()
    {
        return $this->belongsTo(
            Tahun::class,
            'id_tahun',
            'id_tahun'
        );
    }

    public function bulan()
    {
        return $this->belongsTo(
            Bulan::class,
            'id_bulan',
            'id_bulan'
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

    public function pengiriman()
    {
        return $this->hasMany(
            PengirimanLaporan::class,
            'id_data',
            'id_data'
        );
    }
}