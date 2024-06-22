<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AutoDeactivateFeatureJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->autoDeactiveFeature();
    }

    private function autoDeactiveFeature()
    {
        $ads = Ads::get();
    
        foreach ($ads as $value) {
            if ($value->feature_status == 'active' && Carbon::now()->greaterThan($value->feature_end_date)) {
                $updated = $value->update([
                    'feature_status' => 'expired',
                    'feature_start_date' => null,
                    'feature_end_date' => null,
                ]);
            }
        }
    }
}
