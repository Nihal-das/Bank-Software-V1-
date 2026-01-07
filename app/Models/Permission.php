<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /** @use HasFactory<\Database\Factories\PermissionFactory> */
    use HasFactory;

    protected $fillable = ['name', 'route', 'module_id'];

    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'roles_access',
            'permission_id',
            'role_id'
        );
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
