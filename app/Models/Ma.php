<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ma extends Model
{
    protected $table = 'ma';

    protected $primaryKey = 'id_ma';

    public $timestamps = false;

    protected $fillable = [
        'nama_ma'
    ];
}