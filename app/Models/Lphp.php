<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lphp extends Model
{
    protected $table = 'lphp';

    protected $primaryKey = 'id_lphp';

    public $timestamps = false;

    protected $fillable = [
        'nama_lphp'
    ];

    public function users()
    {
        return $this->hasMany(UserAplikasi::class, 'id_lphp', 'id_lphp');
    }
}