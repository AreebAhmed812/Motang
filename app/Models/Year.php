<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'years';    
    protected $fillable = [
        'year',
  
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
}
