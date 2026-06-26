<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeadaanCurahHujan extends Model
{
    protected $table = 'keadaan_curah_hujan';

    protected $primaryKey = 'id_keadaan_curah_hujan';

    public $timestamps = false;

    protected $fillable = [
        'id_kabupaten_kota',
        'id_kecamatan',
        'id_bulan',
        'id_musim_tanam'
    ];

    public function detail()
    {
        return $this->hasMany(
            DetKeadaanCurahHujan::class,
            'id_keadaan_curah_hujan',
            'id_keadaan_curah_hujan'
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