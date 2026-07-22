<?php

namespace App\Models\LPHP;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lphp;
use App\Models\KabupatenKota;

class LphpKabupaten extends Model
{
    protected $table = 'lphp_kabupaten';

    protected $primaryKey = 'id_lphp_kabupaten';

    public $timestamps = false;

    protected $fillable = [
        'id_lphp',
        'id_kabupaten_kota'
    ];

    public function lphp()
    {
        return $this->belongsTo(
            Lphp::class,
            'id_lphp',
            'id_lphp'
        );
    }

    public function kabupaten()
    {
        return $this->belongsTo(
            KabupatenKota::class,
            'id_kabupaten_kota',
            'id_kabupaten_kota'
        );
    }
}