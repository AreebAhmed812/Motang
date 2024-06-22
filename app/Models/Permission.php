<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'display_name', 'group'
    ];
    public function scopeActive($query){
        $query->whereStatus(1);
    }

    // Create relation on service providers table
    public function Roles() {
        return $this->hasMany( Role::class);
    }

}
