<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelompokTani extends Model
{
    protected $table = 'kelompok_tani';

    protected $primaryKey = 'id_kelompok_tani';

    public $timestamps = false;

    protected $fillable = [
        'nama_kelompok',
        'nama_ketua',
        'alamat',
        'id_desa'
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }
}