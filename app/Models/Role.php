<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id', 'status'
    ];

    public function scopeActive($query){
        $query->whereStatus(1);
    }

    // Create relation on service providers table
    public function permission() {
        return $this->hasMany(Permission::class);
    }

    // Create relation on service providers table
    public function user() {
        return $this->hasMany(User::class, 'id', 'user_type');
    }
}
