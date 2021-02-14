<?php

namespace App\Http\Controllers;

use App\Models\Fuel;
use App\Models\Vehicle;
use Exception;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicle.index', ['vehicles' => $vehicles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fuels = Fuel::all();
        return view('vehicle.create', ['fuels' => $fuels]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = new Vehicle;
        $vehicle->kendaraan = $request->name;
        $vehicle->jenis_kendaraan = $request->type;
        $vehicle->merk_kendaraan = $request->merk;
        $vehicle->jarak_tempuh = $request->distance;
        $vehicle->jenis_bbm = $request->fuel;
        try {
            $vehicle->save();
            return [
                'message' => 'data saved successfully',
                'error' => false,
                'code' => 200,     
            ];
        } catch (Exception $e) {
            return [
                'message' => 'internal error',
                'error' => true,
                'code' => 400,
                'errors' => $e,
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        $fuels = Fuel::all();
        return view('vehicle.edit', ['vehicle' => $vehicle, 'fuels' => $fuels]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);

        $vehicle->kendaraan = $request->name;
        $vehicle->jenis_kendaraan = $request->type;
        $vehicle->merk_kendaraan = $request->merk;
        $vehicle->jarak_tempuh = $request->distance;
        $vehicle->jenis_bbm = $request->fuel;
        try {
            $vehicle->save();
            return [
                'message' => 'data saved successfully',
                'error' => false,
                'code' => 200,     
            ];
        } catch (Exception $e) {
            return [
                'message' => 'internal error',
                'error' => true,
                'code' => 400,
                'errors' => $e,
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        try {
            $vehicle->delete();
            return [
                'message' => 'data deleted successfully',
                'error' => false,
                'code' => 200,     
            ];
        } catch (Exception $e) {
            return [
                'message' => 'internal error',
                'error' => true,
                'code' => 400,
                'errors' => $e,
            ];
        }
    }
}
