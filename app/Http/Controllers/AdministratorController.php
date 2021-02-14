<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Fuel;
use Exception;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administrators = Administrator::all();
        return view('administrator.index', ['administrators' => $administrators]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new Administrator;
        $admin->nama = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->hak_akses = $request->role;
        try {
            $admin->save();
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
        $admin = Administrator::find($id);
        return view('administrator.edit', ['admin' => $admin]);
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
        $admin = Administrator::find($id);

        $admin->nama = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->hak_akses = $request->role;
        try {
            $admin->save();
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
        $admin = Administrator::find($id);
        try {
            $admin->delete();
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
