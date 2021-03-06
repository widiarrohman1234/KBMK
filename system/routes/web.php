<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KataController;

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

Route::get('/', function () {
    return view('login');
});

// login
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'loginProcess']);
Route::get('logout', [AuthController::class, 'logout']);

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', [AdminController::class, 'index']);
    // CRUD kata
    Route::get('kata', [KataController::class, 'index']);
    Route::get('kata/create', [KataController::class, 'create']);
    Route::post('kata', [KataController::class, 'store']);
    Route::get('kata/{kata}', [KataController::class, 'show']);
    Route::get('kata/{kata}/edit', [KataController::class, 'edit']);
    Route::post('kata/update/{id}', [KataController::class, 'update']);
    Route::delete('kata/{kata}', [KataController::class, 'destroy']);

});