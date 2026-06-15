<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';

    protected $primaryKey = 'id_desa';

    protected $fillable = [
        'nama_desa',
        'id_kecamatan'
    ];

    public $timestamps = false;

    public function kecamatan()
    {
        return $this->belongsTo(
            Kecamatan::class,
            'id_kecamatan',
            'id_kecamatan'
        );
    }
}