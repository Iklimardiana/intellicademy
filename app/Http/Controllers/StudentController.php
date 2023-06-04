<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class StudentController extends Controller
{
    public function dashboard()
    {
        $id = Auth::user()->id;

        return view('students.dashboard');
    }
}
