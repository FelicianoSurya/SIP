<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;

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
// })->middleware('auth');

Auth::routes([
    'register' => false
]);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/place/{placeId}',[HomeController::class, 'detailPlace']);
    Route::get('/place/{placeId}/clearProvider', [HomeController::class, 'clearProvider']);
    Route::get('/place/{placeId}/deletePlace', [HomeController::class, 'deletePlace']);
    Route::get('/placeForm', [PlaceController::class, 'index'])->name("placeForm");
    Route::post('/place/{placeId}/editPlace', [HomeController::class, 'editPlace'])->name('editPlace');
    Route::post('/place', [HomeController::class, 'postPlace'])->name('postPlace');
    Route::post('/isp', [ProviderController::class, 'postProviderPlace'])->name('postProvider');
    Route::post('/place/editProvider', [ProviderController::class, 'editProvider'])->name('editProvider');
    Route::get('/provider/delete/{idProdvider}', [ProviderController::class, 'deleteProvider']);

    Route::group(['middleware' => 'admin'],function(){
        Route::get('/type/delete/{idType}', [TypeController::class, 'deleteType']);
        Route::get('/isp/delete/{idIsp}', [ProviderController::class, 'deleteIsp']);
        Route::get('/user/delete/{idUser}', [UserController::class, 'deleteUser']);
        
        Route::get("/user", [UserController::class,'index']);
        Route::get("/type", [TypeController::class, 'index']);
        Route::get("/provider", [ProviderController::class,'index']);
    });
});


