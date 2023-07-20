<?php

use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route Produk
Route::get('/market',[ProdukController:: class, 'index']);
Route::get('/market/{id}',[ProdukController:: class, 'show']);
Route::post('/market',[ProdukController:: class, 'store']);
Route::patch('/market/{id}',[ProdukController:: class, 'update']);
Route::delete('/market/{id}',[ProdukController:: class, 'destroy']);

// Route Kategori
Route::get('/kategori',[KategoriController:: class, 'index']);
Route::get('/kategori/{id}',[KategoriController:: class, 'show']);
Route::post('/kategori',[KategoriController:: class, 'store']);
Route::patch('/kategori/{id}',[KategoriController:: class, 'update']);
Route::delete('/kategori/{id}',[KategoriController:: class, 'destroy']);

// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'
// ], function ($router) {
//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');
//     Route::post('wajib', 'AuthController@wajib');
// });
