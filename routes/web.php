<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModalController;
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

Route::get('/aplicacion-con-vue', function () {
     return view('app');
 });
// Route::get('{any}', function () {
//      return view('app');
//  })->where('any', '.*');

Route::post('/guardar-fecha', 'FechaController@store')->name('guardar-fecha');
Route::get('/modal', [ModalController::class, 'index']);
Route::post('/guardar-fecha', [ModalController::class, 'guardarFecha']);
