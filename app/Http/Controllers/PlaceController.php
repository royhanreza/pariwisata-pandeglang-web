<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Place;
use Exception;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all();
        return view('place.index', ['places' => $places]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managers = Manager::all();
        return view('place.create', ['managers' => $managers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $place = new Place;
        $data = json_decode($request->data);
        $place->nama_wisata = $data->name;
        $place->harga_tiket = $data->price;
        $place->alamat = $data->address;
        $place->deskripsi = $data->description;
        $place->jam_buka = $data->open;
        $place->jam_tutup = $data->close;
        $place->latitude = $data->latitude;
        $place->longitude = $data->longitude;
        $place->pengelola = $data->manager;
        $gambar = $request->file('image');
        // $gambar = 'https://www.javatravel.net/wp-content/uploads/2020/07/Pantai-Anyer.jpg';
        // return [
        //     'message' => 'data saved successfully',
        //     'data' => $gambar->getClientOriginalName(),
        //     'error' => false,
        //     'code' => 200,     
        // ];
        $file_name = time()."_". $gambar->getClientOriginalName();
 
        $gambar->move(public_path('img'), $file_name);

        $place->gambar = $file_name;

        try {
            $place->save();
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
        $place = Place::find($id);
        $managers = Manager::all();
        return view('place.edit', ['place' => $place, 'managers' => $managers]);
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
        $place = Place::find($id);
        $data = json_decode($request->data);
        $place->nama_wisata = $data->name;
        $place->harga_tiket = $data->price;
        $place->alamat = $data->address;
        $place->deskripsi = $data->description;
        $place->jam_buka = $data->open;
        $place->jam_tutup = $data->close;
        $place->latitude = $data->latitude;
        $place->longitude = $data->longitude;
        $place->pengelola = $data->manager;
        
        if($request->hasFile('image')) {
            $gambar = $request->file('image');

            $file_name = time()."_". $gambar->getClientOriginalName();
    
            $gambar->move(public_path('img'), $file_name);

            $place->gambar = $file_name;
        
        }

        try {
            $place->save();
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
        $place = Place::find($id);
        try {
            $place->delete();
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
