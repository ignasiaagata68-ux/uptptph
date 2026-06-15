<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    protected $table = 'komoditas';

    protected $primaryKey = 'id_komoditas';

    protected $fillable = [
        'komoditas'
    ];

    public $timestamps = false;
}