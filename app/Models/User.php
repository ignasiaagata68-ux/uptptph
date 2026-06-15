<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';

    protected $primaryKey = 'id_user';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'role',
        'email',
        'id_role'
    ];

    protected $hidden = [
        'password'
    ];
    public function role()
    {
        return $this->belongsTo(
            Role::class,
            'id_role',
            'id_role'
        );
    }

    public function hasPermission($permissionName)
    {
        return $this->role
            ->permissions
            ->contains('nama_permission', $permissionName);
    }

}