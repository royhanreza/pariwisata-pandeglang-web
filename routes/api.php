<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VisitorController;
use App\Models\Place;
use App\Models\Plan;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Pengelola
Route::post('/pengelola', [ManagerController::class, 'store']);
Route::delete('/pengelola/{id}', [ManagerController::class, 'destroy']);
Route::patch('/pengelola/{id}', [ManagerController::class, 'update']);
// Wisata
Route::get('/wisata', function() {
    $places = Place::with('manager')->get();
    return response()->json([
        'status' => 'OK',
        'code' => 200,
        'data' => $places
    ]);
});

Route::get('/wisata/{id}', function($id) {
    $place = Place::with('manager')->find($id);
    return response()->json([
        'status' => 'OK',
        'code' => 200,
        'data' => $place
    ]);
});

// Kendaraan
Route::get('/kendaraan', function() {
    $vehicles = Vehicle::with('fuel')->get();
    return response()->json([
        'status' => 'OK',
        'code' => 200,
        'data' => $vehicles
    ]);
});

Route::get('/kendaraan/{id}', function($id) {
    $vehicle = Vehicle::with('fuel')->find($id);
    return response()->json([
        'status' => 'OK',
        'code' => 200,
        'data' => $vehicle
    ]);
});


Route::post('/wisata', [PlaceController::class, 'store']);
Route::delete('/wisata/{id}', [PlaceController::class, 'destroy']);
Route::patch('/wisata/{id}', [PlaceController::class, 'update']);
// BBM
Route::post('/bbm', [FuelController::class, 'store']);
Route::delete('/bbm/{id}', [FuelController::class, 'destroy']);
Route::patch('/bbm/{id}', [FuelController::class, 'update']);
// Kendaraan
Route::post('/kendaraan', [VehicleController::class, 'store']);
Route::delete('/kendaraan/{id}', [VehicleController::class, 'destroy']);
Route::patch('/kendaraan/{id}', [VehicleController::class, 'update']);
// Pengunjung
Route::post('/pengunjung/login', [VisitorController::class, 'login']);
Route::post('/pengunjung/register', [VisitorController::class, 'store']);
Route::delete('/pengunjung/{id}', [VisitorController::class, 'destroy']);
Route::patch('/pengunjung/{id}', [VisitorController::class, 'update']);
// Administrator
Route::post('/administrator', [AdministratorController::class, 'store']);
Route::delete('/administrator/{id}', [AdministratorController::class, 'destroy']);
Route::patch('/administrator/{id}', [AdministratorController::class, 'update']);
// Rencana
Route::get('/rencana', [PlanController::class, 'index']);
Route::get('/pengunjung/{id}/rencana', function($id) {
    // $plan = Plan::with('wisata')->where('pengunjung_id', $id)->get();
    $plan = DB::table('plans')
        ->join('places', 'plans.wisata_id', '=', 'places.id')
        ->join('managers', 'places.pengelola', '=', 'managers.id')
        ->select('plans.*', 'nama_wisata', 'harga_tiket', 'places.alamat as alamat_wisata', 'deskripsi', 'jam_buka', 'jam_tutup', 'places.latitude as latitude_wisata', 'places.longitude as longitude_wisata', 'places.gambar as gambar_wisata', 'managers.nama as pengelola', 'managers.telepon as telepon_pengelola')
        ->where('pengunjung_id', $id)
        ->get();

    return response()->json([
        'status' => 'OK',
        'code' => 200,
        'data' => $plan
    ]);
});
// Route::get('/rencana/{id}', [PlanController::class, 'show']);
Route::post('/rencana', [PlanController::class, 'store']);
Route::delete('/rencana/{id}', [PlanController::class, 'destroy']);
Route::patch('/rencana/{id}', [PlanController::class, 'update']);
