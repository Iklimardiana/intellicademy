<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PdfController extends Controller
{
    public function sertifikat($id){
        $user = Auth::user();
        $course = Course::where('id', $id)->first();
        $transaction = Transaction::where('idCourse' , $id)
                    ->where('idUser', $user->id)->first();

        $certificate = Certificate::where('idTransaction', $transaction->id)->first();
        if($certificate){
            $pdf = PDF::loadView('pdf.sertifikat', compact('certificate'))->setPaper('a4', 'landscape');
            return $pdf->stream("sertifikat" . $user->id . $course->id . $transaction->id . ".pdf");
        }else{
            $certificate = new Certificate;
            $certificate->idTransaction = $transaction->id;
            $certificate->save();

            $certificate = Certificate::where('idTransaction', $transaction->id)->first();
            $pdf = PDF::loadView('pdf.sertifikat', compact('certificate'))->setPaper('a4', 'landscape');
            return $pdf->stream("sertifikat" . $user->id . $course->id . $transaction->id . ".pdf");
        }           
        // $date = date('d');
        // $year = date('Y');
        // $monthNum  = date('m');
        // $month = date('F', mktime(0, 0, 0, (int)$monthNum, 10));

        // $pdf = PDF::loadView('pdf.sertifikat', compact('user', 'course', 'transaction', 'date', 'year', 'month'))->setPaper('a4', 'landscape');
        // return $pdf->stream("sertifikat" . $user->id . $course->id . $transaction->id . ".pdf");
    }

    public function invoice($id){
        $transaction = Transaction::where('id' , $id)->first();
        $date = date('d');
        $year = date('Y');
        $monthNum  = date('m');
        $month = date('F', mktime(0, 0, 0, (int)$monthNum, 10));

        $pdf = PDF::loadView('pdf.invoice', compact('transaction', 'date', 'year', 'month', 'monthNum'))->setPaper('a4', 'potrait');
        return $pdf->stream("invoice-0" . $transaction->id . $date . $monthNum . $year . ".pdf");

        // return view('pdf.invoice', compact('transaction', 'date', 'year', 'month', 'monthNum'));
    }
}
