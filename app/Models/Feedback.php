<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\Ads;
class Feedback extends Model
{
    use HasFactory;
    protected $table = "feedbacks";
    protected $fillable = [
        'title',
        'description',
        'ad_id',
    ];
    public function adsdata() {
        return $this->belongsTo(Ads::class, 'ad_id','id');
    }

    public function ad()
    {
        return $this->belongsTo(Ads::class, 'ad_id');
    }
    
}
