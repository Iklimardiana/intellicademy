<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $transaction = Transaction::where('idUser', $id)->paginate(1);
        // dd($transaction);
        return view('students.transaction', compact('transaction'));
    }

    public function checkout($id)
    {
        if (request()->isMethod('get')) {
            $id_user = Auth::user()->id;

            $existingTransaction = Transaction::where('idCourse', $id)
                ->where('idUser', $id_user)
                ->where('verification', '0')
                ->first();

            if ($existingTransaction) {
                $transaction = $existingTransaction;

                // Set your Merchant Server Key
                \Midtrans\Config::$serverKey = config('midtrans.server_key');
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = false;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;

                $params = array(
                    'transaction_details' => array(
                        'order_id' => $transaction->id,
                        'gross_amount' => $transaction->Course->price,
                    ),
                    'customer_details' => array(
                        'first_name' => Auth::user()->firstName,
                        'last_name' => Auth::user()->lastName,
                        'email' => Auth::user()->email,
                        'phone' => Auth::user()->phone,
                    ),
                );

                $snapToken = \Midtrans\Snap::getSnapToken($params);
            
                return view('students.checkout', compact('transaction', 'snapToken'));
            }
        } else if (request()->isMethod('post')) {
            $str = mt_rand(1000000000, 9999999999);
            $id_user = Auth::user()->id;

            $transaction = new Transaction;
            $transaction->id = $str;
            $transaction->idCourse = $id;
            $transaction->idUSer = $id_user;
            $transaction->save();

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $transaction->id,
                    'gross_amount' => $transaction->Course->price,
                ),
                'customer_details' => array(
                    'first_name' => Auth::user()->firstName,
                    'last_name' => Auth::user()->lastName,
                    'email' => Auth::user()->email,
                    'phone' => Auth::user()->phone,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('students.checkout', compact('transaction', 'snapToken'));
        }
    }

    
    // public function checkout($id){
    //     $str = mt_rand(1000000000, 9999999999);
    //     $id_user = Auth::user()->id;

    //     $transaction = new Transaction;
    //     $transaction->id = $str;
    //     $transaction->idCourse = $id;
    //     $transaction->idUSer = $id_user;
    //     $transaction->save();

    //     // Set your Merchant Server Key
    //     \Midtrans\Config::$serverKey = config('midtrans.server_key');
    //     // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    //     \Midtrans\Config::$isProduction = false;
    //     // Set sanitization on (default)
    //     \Midtrans\Config::$isSanitized = true;
    //     // Set 3DS transaction for credit card to true
    //     \Midtrans\Config::$is3ds = true;

    //     $params = array(
    //         'transaction_details' => array(
    //             'order_id' => $transaction->id,
    //             'gross_amount' => $transaction->Course->price,
    //         ),
    //         'customer_details' => array(
    //             'first_name' => Auth::user()->firstName,
    //             'last_name' => Auth::user()->lastName,
    //             'email' => Auth::user()->email,
    //             'phone' => Auth::user()->phone,
    //         ),
    //     );

    //     $snapToken = \Midtrans\Snap::getSnapToken($params);
    //     return view('students.checkout', compact('transaction', 'snapToken'));
    // }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $transaction = Transaction::find($request->order_id);
                $transaction->update(['verification' => '1']);
            }
        }
    }
}

