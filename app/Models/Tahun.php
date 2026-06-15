<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    protected $table = 'tahun';

    protected $primaryKey = 'id_tahun';

    protected $fillable = [
        'tahun'
    ];

    public $timestamps = false;
}