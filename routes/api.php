<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\AdsController;
use App\Http\Controller\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\DummyPostController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::apiResource('/user','App\Http\Controllers\UserController'); 
    Route::apiResource('/brands','App\Http\Controllers\BrandController');
    Route::apiResource('/models','App\Http\Controllers\ModelManagementsController');
    Route::apiResource('/ads','App\Http\Controllers\AdsController');
    Route::apiResource('/feedbacks','App\Http\Controllers\FeedbackController');
    Route::apiResource('/reports','App\Http\Controllers\ReportController');
});

Route::apiResource('/contact','App\Http\Controllers\MessageContactController');
Route::post('/login',[App\Http\Controllers\UserController::class, 'index']); 

Route::post('/apiControl',[App\Http\Controllers\ApiTestController::class, 'apiControl']);
// Route::post('ads',[App\Http\Controllers\AdsController::class, 'index']);
// Route::post('/dummypost',[App\Http\Controllers\dummypostController::class, 'dummypostController']);
Route::post('/dummy-post', [App\Http\Controllers\DummyPostController::class, 'dummyPost']);
Route::apiResource('ads','App\Http\Controllers\AdsController');