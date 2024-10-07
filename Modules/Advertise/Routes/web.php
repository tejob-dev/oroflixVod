<?php
use App\Faq;
use App\User;
use App\Http\Controllers\HideForMeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\Advertise\Http\Controllers\AdvertiseController;

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

// Route::prefix('advertise')->group(function() {
//     Route::get('/', 'AdvertiseController@index');
// });

Route::group(['middleware' => ['web', 'IsInstalled', 'isActive', 'auth', 'is_admin', 'switch_languages', 'TwoFactor']], function () {
   
    Route::get('admin/ads', 'AdvertiseController@getAds')->name('ads');
   
    Route::post('admin/ads/insert', 'AdvertiseController@store')->name('ad.store');

    Route::get('admin/ads/setting', 'AdvertiseController@getAdsSettings')->name('ad.setting');

    Route::put('admin/ads/timer', 'AdvertiseController@updateAd')->name('ad.update');

    Route::put('admin/ads/pop', 'AdvertiseController@updatePopAd')->name('ad.pop.update');

    Route::delete('admin/ads/delete/{id}', 'AdvertiseController@delete')->name('ad.delete');

    Route::get('admin/ads/create', 'AdvertiseController@create')->name('ad.create');

    Route::get('admin/ads/edit/{id}', 'AdvertiseController@showEdit')->name('ad.edit');

    Route::put('admin/ads/edit/{id}', 'AdvertiseController@updateADSOLO')->name('ad.update.solo');

    Route::put('admin/ads/video/{id}', 'AdvertiseController@updateVideoAD')->name('ad.update.video');

    Route::post('admin/ads/bulk_delete', 'AdvertiseController@bulk_delete');

});