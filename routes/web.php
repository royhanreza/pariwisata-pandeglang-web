<?php

use App\Http\Controllers\ManagerController;
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

Route::get('/', function () {
    return view('welcome');
});

// Manager (Pengelola)
Route::get('/pengelola', [ManagerController::class, 'index']);
Route::get('/pengelola/create', [ManagerController::class, 'create']);
Route::get('/pengelola/{id}', [ManagerController::class, 'show']);
Route::get('/pengelola/edit/{id}', [ManagerController::class, 'edit']);

