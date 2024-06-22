<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id', 'permission_id', 'user_id'
    ];

  
    // Create relation on service providers table
    public function permission() {
        return $this->hasMany(Permission::class);
    }

    // Create relation on service providers table
    public function user() {
        return $this->hasMany(User::class, 'id', 'user_type');
    }
}
