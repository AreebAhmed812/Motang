<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ReportController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('home');
Route::get('/list', [App\Http\Controllers\FrontController::class, 'list'])->name('list');
Route::get('/innerDetail',[App\Http\Controllers\FrontController::class,'innerDetail'])->name('innerDetail');
Route::resource('feedbacks',FeedbackController::class);
// Route::get('/feedback',[App\Http\Controllers\FrontController::class,'feedback'])->name('feedback');
Route::get('/',[AdsController::class,'fetchAds']);
Route::get('/contact-us',[App\Http\Controllers\FrontController::class,'contact'])->name('contact');
Route::get('/terms-and-conditons',[App\Http\Controllers\FrontController::class,'termsConditions'])->name('termsConditions');
Route::get('/privacy-policy',[App\Http\Controllers\FrontController::class,'privacyPolicy'])->name('privacyPolicy');
Route::get('/about-us',[App\Http\Controllers\FrontController::class,'aboutUs'])->name('aboutUs');
// Route::resource('/report',[App\Http\Controllers\FrontController::class,'re'])->name('report');
Route::resource('reports',ReportController::class);

Route::resource('/contact','App\Http\Controllers\MessageContactController');
Route::get('/search',[App\Http\Controllers\FrontController::class,'search'])->name('search');
// Route::get('/list/search', [ProductController::class, 'search'])->name('ads.search');
Route::get('/admin', [App\Http\Controllers\FrontController::class, 'admin'])->name('admin');
Route::post('/admin', [App\Http\Controllers\FrontController::class, 'adminLogin'])->name('adminLogin');
Route::get('/sign-in', [App\Http\Controllers\FrontController::class, 'user'])->name('user');
Route::post('/sign-in', [App\Http\Controllers\FrontController::class, 'userLogin'])->name('userLogin');
Route::get('/sign-up', [App\Http\Controllers\FrontController::class, 'signUp'])->name('signUp');
Route::post('/sign-up', [App\Http\Controllers\FrontController::class, 'signUpUser'])->name('signUpUser');
// Password Reset Routes
Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'ResetPasswordController@reset');

Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::resource('roles','App\Http\Controllers\RoleController');
Route::resource('users','App\Http\Controllers\UserController');

Route::resource('sellers','App\Http\Controllers\UserController');

Route::resource('/ads','App\Http\Controllers\AdsController');
Route::post('/brand-fetch', [App\Http\Controllers\AdsController::class, 'brandFetch'])->name('brandFetch');
Route::get('/checkExpire', [App\Http\Controllers\AdsController::class, 'autoDeactiveFeature'])->name('checkExpire');
Route::resource('brands','App\Http\Controllers\BrandController');
// Route::resource('model-management','App\Http\Controllers\ModelManagementController');

Route::resource('model','App\Http\Controllers\ModelManagementsController');
Route::get('/seller',[App\Http\Controllers\UserController::class, 'seller'])->name('seller');
Route::resource('years','App\Http\Controllers\YearController');
Route::resource('/profile',UserController::class);
Route::get('/ad/block/{id}', [App\Http\Controllers\AdsController::class, 'blockAd'])->name('ad.block');

Route::post('/feature', [App\Http\Controllers\AdsController::class, 'makeFeature'])->name('ads.feature');

