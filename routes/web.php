<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VisitorController;
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

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function() {
  
  Route::middleware(['access.regular'])->group(function() {
    Route::get('/', [PlaceController::class, 'index']);

    // Manager (Pengelola)
    Route::get('/pengelola', [ManagerController::class, 'index']);
    Route::get('/pengelola/create', [ManagerController::class, 'create']);
    Route::get('/pengelola/edit/{id}', [ManagerController::class, 'edit']);
    // Place (Tempat Wisata)
    Route::get('/wisata', [PlaceController::class, 'index']);
    Route::get('/wisata/create', [PlaceController::class, 'create']);
    Route::get('/wisata/edit/{id}', [PlaceController::class, 'edit']);
    // Fuel (BBM)
    Route::get('/bbm', [FuelController::class, 'index']);
    Route::get('/bbm/create', [FuelController::class, 'create']);
    Route::get('/bbm/edit/{id}', [FuelController::class, 'edit']);
    // Vehicle (Kendaraan)
    Route::get('/kendaraan', [VehicleController::class, 'index']);
    Route::get('/kendaraan/create', [VehicleController::class, 'create']);
    Route::get('/kendaraan/edit/{id}', [VehicleController::class, 'edit']);
    // Visitor (Pengunjung)
    Route::get('/pengunjung', [VisitorController::class, 'index']);
    // Route::get('/pengunjung/create', [VisitorController::class, 'create']);
    // Route::get('/pengunjung/edit/{id}', [VisitorController::class, 'edit']);
  });

  // Administrator
  Route::middleware(['access.super'])->group(function() {
    Route::get('/administrator', [AdministratorController::class, 'index']);
    Route::get('/administrator/create', [AdministratorController::class, 'create']);
    Route::get('/administrator/edit/{id}', [AdministratorController::class, 'edit']);
  });
});

