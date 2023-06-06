<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\MailSend;
use Session;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $str = Str::random(100);

        $details = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'username' => $request->username,
            'website' => 'IntelliCademy',
            'role' => 'Student',
            'datetime' => date('Y-m-d H:i:s'),
            'url' => request()->getHttpHost() . '/register/' . $str,
            'key' => $str
        ];

        $url = request()->getHttpHost() . '/register/' . $str;

        Mail::to($request->email)->send(new MailSend($details, $url));

        if(Mail::failures()){
            return back()->with('eror', 'Terjadi kesalahan silahkan coba lagi');
        }else{
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
            $user->key = $str;
    
            $user->save();
            return redirect('/register')->with('message', 'Link verifikasi telah dikirim ke email Anda. Silahkan cek email untuk memverifikasi');
        }
        
        
    }

    public function verify($key)
    {
        $keyCheck = User::select('key')
            ->where('key', $key)
            ->exists();

            if($keyCheck){
                $user = User::where('key', $key)->first();
                $user->active = '1';
                $user->email_verified_at = date('Y-m-d H:i:s');
                $user->save();
                return redirect('/login')->with('message', 'Akun anda sudah aktif, silahkan login');;
            }else{
                return "Keys Tidak Valid";
            }
    }
}
