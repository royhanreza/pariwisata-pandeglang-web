<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        // $id = Auth::id();
        // $admin = Administrator::find($id);
        
        return view('auth.login');
    }


    public function authenticate(Request $request)
    {
        // $credentials = $request->only('email', 'password');

        $username = $request->username;
        $password = $request->password;

        if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
            //user sent their email 
            Auth::attempt(['email' => $username, 'password' => $password]);
        } else {
            //they sent their username instead 
            Auth::attempt(['username' => $username, 'password' => $password]);
        }

        if ( Auth::check() ) {
            //send them where they are going 
            $request->session()->regenerate();
            // return redirect()->intended('wisata');
            return response()->json([
                'status' => 'OK',
                'message' => 'logged on',
                'redirect' => (Auth::user()->hak_akses == 'super') ? '/administrator' : '/wisata',
                'code' => 200
            ]);
        }

        return response()->json([
            'status' => 'FAIL',
            'message' => 'failed to login',
            'code' => 400
        ], 400);

        //Nope, something wrong during authentication 
        // return back()->withErrors([
        //     'credentials' => 'Please, check your credentials'
        // ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('dashboard');
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);


        // if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
        //     //user sent their email 
        //     Auth::attempt(['email' => $username, 'password' => $password]);
        // } else {
        //     //they sent their username instead 
        //     Auth::attempt(['username' => $username, 'password' => $password]);
        // }

        // //was any of those correct ?
        // if ( Auth::check() ) {
        //     //send them where they are going 
        //     return redirect()->intended('dashboard');
        // }

        // //Nope, something wrong during authentication 
        // return redirect()->back()->withErrors([
        //     'credentials' => 'Please, check your credentials'
        // ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
