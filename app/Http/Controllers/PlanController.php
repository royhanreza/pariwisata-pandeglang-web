<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Exception;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $places = Place::with('manager')->get();
        // return response()->json([
        //     'status' => 'OK',
        //     'code' => 200,
        //     'data' => $places
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plan = new Plan;
        $plan->nama_rencana = $request->nama_rencana;
        $plan->jumlah_dana = $request->jumlah_dana;
        $plan->jumlah_wisatawan = $request->jumlah_wisatawan;
        $plan->tanggal_wisata = $request->tanggal_wisata;
        $plan->lama_wisata = $request->lama_wisata;
        $plan->latitude_berangkat = $request->latitude_berangkat;
        $plan->longitude_berangkat = $request->longitude_berangkat;
        $plan->longitude_berangkat = $request->longitude_berangkat;
        $plan->kendaraan_id = $request->kendaraan_id;
        $plan->jumlah_kendaraan = $request->jumlah_kendaraan;
        $plan->wisata_id = $request->wisata_id;
        $plan->pengunjung_id = $request->pengunjung_id;
        try {
            $plan->save();
            return response()->json(
                [
                    'message' => 'data saved successfully',
                    'error' => false,
                    'code' => 200,     
                ], 200
            );
        } catch (Exception $e) {
            return response()->json([
                'message' => 'internal error',
                'error' => true,
                'code' => 400,
                'errors' => $e,
            ], 400);
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
        //
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
        $plan = Plan::find($id);
        $plan->nama_rencana = $request->nama_rencana;
        $plan->jumlah_dana = $request->jumlah_dana;
        $plan->jumlah_wisatawan = $request->jumlah_wisatawan;
        $plan->tanggal_wisata = $request->tanggal_wisata;
        $plan->lama_wisata = $request->lama_wisata;
        $plan->latitude_berangkat = $request->latitude_berangkat;
        $plan->longitude_berangkat = $request->longitude_berangkat;
        $plan->kendaraan_id = $request->kendaraan_id;
        $plan->jumlah_kendaraan = $request->jumlah_kendaraan;
        $plan->wisata_id = $request->wisata_id;
        $plan->pengunjung_id = $request->pengunjung_id;
        try {
            $plan->save();
            return response()->json(
                [
                    'message' => 'data saved successfully',
                    'error' => false,
                    'code' => 200,     
                ], 200
            );
        } catch (Exception $e) {
            return response()->json([
                'message' => 'internal error',
                'error' => true,
                'code' => 400,
                'errors' => $e,
            ], 400);
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
        $plan = Plan::find($id);
        try {
            $plan->delete();
            return response()->json([
                'message' => 'data deleted successfully',
                'error' => false,
                'code' => 200,     
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'internal error',
                'error' => true,
                'code' => 400,
                'errors' => $e,
            ], 400);
        }
    }
}
