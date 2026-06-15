<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $primaryKey = 'id_permission';

    protected $fillable = [
        'nama_permission'
    ];

    public $timestamps = false;

    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'role_permission',
            'id_permission',
            'id_role'
        );
    }
}