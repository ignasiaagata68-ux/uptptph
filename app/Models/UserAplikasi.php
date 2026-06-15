<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAplikasi extends Model
{
    protected $table = 'user';

    protected $primaryKey = 'id_petugas';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'role',
        'email'
    ];
}