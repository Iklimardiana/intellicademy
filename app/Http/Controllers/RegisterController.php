<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'firstName' => 'required',
            'lastName',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required',
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;

        $user->save();
        
        return redirect('/login');
    }
}
