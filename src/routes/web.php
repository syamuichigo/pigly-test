<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WeightController;

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

Route::middleware('auth')->group(function () {
    Route::get('/admin', [WeightController::class, 'admin']);
});
route::get('search', [WeightController::class, 'search']);
route::post('/add', [WeightController::class, 'add']);
Route::get('/detail', [WeightController::class, 'detail']);
route::post('/update', [WeightController::class, 'update']);
route::delete('/delete', [WeightController::class, 'delete']);
route::get('target', [WeightController::class, 'target']);
route::post('target/update', [WeightController::class, 'target_update']);
Route::get('weight_register', [WeightController::class, 'weight_register']);
route::post('create_target', [WeightController::class, 'create_target']);
