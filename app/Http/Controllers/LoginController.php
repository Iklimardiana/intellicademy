<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 2 && Auth::user()->active == 0) {
                Auth::logout();
                return back()->with('loginError', 'Silahkan verifikasi email anda terlebih dahulu');
            }

            // return redirect()->intended('/admin');
            if(Auth::user()->role == 0){
                return redirect()->intended('/admin');
            }elseif(Auth::user()->role == 1){
                return redirect()->intended('/teacher');
            }else{
                return redirect()->intended('#');
            }
        }

        return back()->with('loginError', 'login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect('/');
    }
}
