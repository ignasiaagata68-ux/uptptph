<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    //
    protected $table ='kecamatan';
    protected $primaryKey = 'id_kecamatan';
    protected $fillable = [
        'nama_kecamatan',
        'id_kabupaten_kota'
    ];
    public $timestamps = false;
    public function kabupaten()
    {
        return $this->belongsTo(
            KabupatenKota::class,
            'id_kabupaten_kota',
            'id_kabupaten_kota'
        );
    }
}
