<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opt extends Model
{
    protected $table = 'opt';

    protected $primaryKey = 'id_opt';

    public $timestamps = false;

    protected $fillable = [
        'id_komoditas',
        'nama_opt'
    ];

    public function komoditas()
    {
        return $this->belongsTo(
            Komoditas::class,
            'id_komoditas',
            'id_komoditas'
        );
    }
}