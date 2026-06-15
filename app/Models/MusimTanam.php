<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusimTanam extends Model
{
    protected $table = 'musim_tanam';

    protected $primaryKey = 'id_musim_tanam';

    protected $fillable = [
        'musim_tanam'
    ];

    public $timestamps = false;
}