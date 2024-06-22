<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelManagements extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "model_managements";
    protected $fillable = [
        'make_brand',
        'model',
  
    ];
  /**
    * The attributes that should be cast.
    * @var array<int, string>
    */
   protected $hidden = [
       'password',
       'remember_token',
   ];

   /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
    */
   protected $casts = [
       'email_verified_at' => 'datetime',
   ];
    public function role() {
        return $this->belongsTo(Role::class, 'user_type', 'id');
    }
    public function brand() {
        return $this->belongsTo(Brand::class, 'make_brand','id');
    }
}
