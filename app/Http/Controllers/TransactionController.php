<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
public function index()
    {
        $id = Auth::user()->id;
        $transaction = Transaction::where('idUser', $id)->get();
        // dd($transaction);
        return view('students.transaction', compact('transaction'));
    }
}
