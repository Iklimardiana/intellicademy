<?php

namespace App\Http\Controllers;

use App\Mail\MailResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\MailSend;
use App\Models\ResetPassword;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function forgot_password(){
        return view('auth.forgot_password');
    }

    public function store(Request $request){
        $str = Str::random(100);

        $details = [
            'website' => 'IntelliCademy',
            'datetime' => date('Y-m-d H:i:s'),
            'url' => request()->getHttpHost() . '/reset/' . $str
        ];

        Mail::to($request->email)->send(new MailResetPassword($details));

        $resetPassword = new ResetPassword();
            $resetPassword ->email = $request->email;
            $resetPassword->key = $str;

            $resetPassword->save();
            return redirect('/forgot')->with('message','Silahkan buka Email anda untuk mereset Password');
    }

    public function verify($key){
        $keyCheck = ResetPassword::select('key')
        ->where('key', $key)
        ->exists();

        if($keyCheck){
            $resetPassword = ResetPassword::where('key', $key)->first();
            return view('auth.new_password', ['resetPassword' => $resetPassword]);
        }
        else{
            return "Keys tidak valid";
        }
    }

    public function reset(Request $request){
        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/login')->with('message','Password berhsail direset');
    }
}
