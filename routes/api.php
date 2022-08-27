<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCtrl;

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

Route::get("/product/{kategori?}",[ApiCtrl::class,'get_product']);
Route::get("/product_favorite",[ApiCtrl::class,'get_product_favorite']);
Route::get("/favorite/{id}/{fav}",[ApiCtrl::class,'update_product_favorite']);
Route::post("/login",[ApiCtrl::class,'login']);
Route::post("/registrasi",[ApiCtrl::class,'registrasi']);
Route::post("/member",[ApiCtrl::class,'member']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
