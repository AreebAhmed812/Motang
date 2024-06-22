<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Report;
use App\Models\MessageContact;
use App\Models\Brand;
use App\Models\ModelManagements;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userType = auth()->user()->user_type;
        $userId = ($userType == 3) ? auth()->user()->id : null;
        $adsData = Ads::with(['feedback', 'report'])->when($userId, function ($query) use ($userId) {
            return $query->where('user_id', $userId);
        })->get();
        // dd($adsData);
        $adsCount = $adsData->count();
        // dd($adsCount);
        $feedbackCount = $adsData->sum(function ($ad) {
            return $ad->feedback->count();
        });
        $reportCount = $adsData->sum(function ($ad) {
            return $ad->report->count();
        });
        $blockUser = User::where('status', 0)->count();
        $activeUser = User::where('status', 1)->count();
        $activeAds = Ads::where('status', 1 )->count();
        //    Weekly Ads & Monthly Ad

        // Monthly ads
        $monthlyStart = Carbon::now()->startOfMonth();
        $monthlyEnd = Carbon::now()->endOfMonth();
        
        $monthlyAds = Ads::where('status', 1)
            ->whereBetween('created_at', [$monthlyStart, $monthlyEnd])
            ->count();
        
        // Weekly ads
        $weeklyStart = Carbon::now()->startOfWeek();
        $weeklyEnd = Carbon::now()->endOfWeek();
        // dd($weeklyEnd);
        $weeklyAds = Ads::where('status', 1)
            ->whereBetween('created_at', [$weeklyStart, $weeklyEnd])
            ->count();
            $dayAdsstart = Carbon::today();
            $dayAdsend = Carbon::now()->endOfDay();
            
            $dayAds = Ads::where('status', 1)
                ->whereBetween('created_at', [$dayAdsstart, $dayAdsend])
                ->count();
            
        // $reportCount = Report::count();
        // $feedbackCount = Feedback::count();
        $messageCount = MessageContact::count();
        $brandCount = Brand::count();
        $modelCount = ModelManagements::count();
        // $userCount = User::whereIn('user_type', [1, 2])->count();
        $totalView = Ads::when($userId, function ($query) use ($userId) {
            return $query->where('user_id', $userId);
        })->sum('total_click');
        $query = User::query();
        // Count for seller
        $sellerCount = (clone $query)->where('user_type', 3)->count();   
        // Count for users with user_type 1 or 2
        $userCount = (clone $query)->whereIn('user_type', [1, 2])->count();
        return view('dashboard', compact('sellerCount', 'reportCount', 'feedbackCount', 'messageCount', 'brandCount', 'adsCount', 'modelCount', 'dayAds','userCount', 'totalView','activeUser','blockUser','activeAds','monthlyAds','weeklyAds'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function home()
    // {
    //     return view('home');
    // }
    
}