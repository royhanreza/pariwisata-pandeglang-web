<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Exception;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitor::all();
        return view('visitor.index', ['visitors' => $visitors]);
    }

    public function store(Request $request)
    {
        $visitor = new Visitor;
        $visitor->nama = $request->name;
        $visitor->username = $request->username;
        $visitor->email = $request->email;
        $visitor->password = $request->password;
        $visitor->alamat = '';
        $visitor->foto = 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png';

        $errors = [];

        if (Visitor::where('email', $request->email)->exists()) {
            array_push($errors, ['field' => 'email', 'error' => 'Email sudah digunakan']);
        }

        if (Visitor::where('username', $request->username)->exists()) {
            array_push($errors, ['field' => 'username', 'error' => 'Username sudah digunakan']);
        }

        if(count($errors) < 1) {
            try {
                $visitor->save();
                return response()->json([
                    'message' => 'data saved successfully',
                    'error' => false,
                    'code' => 200,     
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'message' => 'internal error',
                    'error' => true,
                    'code' => 400,
                    'errors' => $e,
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Validation errors',
                'error' => true,
                'code' => 400,
                'errors' => $errors,
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $visitor = Visitor::find($id);

        $visitor->nama = $request->name;
        $visitor->username = $request->username;
        $visitor->email = $request->email;
        if($request->password !== null) {
            $visitor->password = $request->password;
        }
        $visitor->alamat = 'bandung';
        $visitor->foto = 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png';

        $errors = [];

        if (Visitor::where('email', $request->email)->whereNotIn('id', [$id])->exists()) {
            array_push($errors, ['field' => 'email', 'error' => 'Email sudah digunakan']);
        }

        if (Visitor::where('username', $request->username)->whereNotIn('id', [$id])->exists()) {
            array_push($errors, ['field' => 'username', 'error' => 'Username sudah digunakan']);
        }

        if(count($errors) < 1) {
            try {
                $visitor->save();
                return response()->json([
                    'message' => 'data saved successfully',
                    'error' => false,
                    'code' => 200,     
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'message' => 'internal error',
                    'error' => true,
                    'code' => 400,
                    'errors' => $e,
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Validation errors',
                'error' => true,
                'code' => 400,
                'errors' => $errors,
            ]);
        }

    }

    public function destroy($id)
    {
        $visitor = Visitor::find($id);
        try {
            $visitor->delete();
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

    public function login(Request $request) {
        $email = $request->email;
        $password = $request->password;

        $visitor = Visitor::where('email', $email)->orWhere('username', $email)
        ->first();

        if($visitor === null) {
            return response()->json([
                'message' => 'username atau password salah',
                'error' => true,
                'code' => 400,
            ]);
        } else {
            if($visitor->password !== $password) {
                return response()->json([
                    'message' => 'username atau password salah',
                    'error' => true,
                    'code' => 400,
                ]);
            } else {
                return response()->json([
                    'message' => 'OK',
                    'error' => false,
                    'code' => 200,     
                    'data' => $visitor,
                ]);
            }
        }

    }
}
