<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ads;
class Report extends Model
{
    use HasFactory;
    protected $tables = 'reports';
    protected $fillable = [
        'report',
        'description',
        'status',
        'ad_id',
    ];
    public function adsdata()
    {
        return $this->belongsTo(Ads::class, 'ad_id', 'id');
    }

    public function ad()
    {
        return $this->belongsTo(Ads::class, 'ad_id');
    }
}
