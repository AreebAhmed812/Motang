<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "ads";
    protected $fillable = [
        'make_brand',
        'model',
        'location',
        'year_of_manufacture',
        'color',
        'condition',
        'transmission',
        'car_registered',
        'fuel',
        'seats',
        'doors',
        'price',
        'price_negotiable',
        'listed_by',
        'phone_number',
        'status',
        'attachment_id',
        'description',
        'user_id',
        'total_click',
        'is_feature',
        'feature_status',
        'feature_start_date',
        'feature_end_date',
  
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
    public function user() {
    return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function role() {
        return $this->belongsTo(Role::class, 'user_type', 'id');
    }
    public function modelData() {
        return $this->belongsTo(ModelManagements::class, 'model','id');
    }
    public function brandData() {
        return $this->belongsTo(Brand::class, 'make_brand','id');
    }
    public function yearData() {
        return $this->belongsTo(Year::class, 'year_of_manufacture','id');
    }
    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'ad_id');
    }
    public function report()
    {
        return $this->hasMany(Report::class, 'ad_id');
    }
}
