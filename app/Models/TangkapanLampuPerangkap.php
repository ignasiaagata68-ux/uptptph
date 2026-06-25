<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TangkapanLampuPerangkap extends Model
{
    protected $table = 'tangkapan_lampu_perangkap';

    protected $primaryKey = 'id_tangkapan_lampu_perangkap';

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
            DetTangkapanLampuPerangkap::class,
            'id_tangkapan_lampu_perangkap',
            'id_tangkapan_lampu_perangkap'
        );
    }
}