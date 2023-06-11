<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Controllers\CourseController;
use App\Controllers\TeacherController;

use App\Models\User;
use App\Models\Course;
use App\Models\Progres;
use App\Models\Module;
use App\Models\Transaction;
use App\Models\Attachment;

class StudentController extends Controller
{
    public function dashboard()
    {
        $id = Auth::user()->id;

        $transaction = Transaction::where('idUser', $id)
                        ->where('verification','1')->get();
        $courses = Course::get();
        $progres = Progres::where('idUSer', $id)->get();

        return view('students.dashboard', compact('transaction', 'progres'));

        // return view('students.dashboard', compact('courses', 'modules'));
    }

    public function indexProfile($id)
    {
        $profile = User::findOrFail($id);

        return view('profile.view', compact('profile'));
    }

    public function editProfile($id)
    {
        $profile = User::findOrFail($id);

        return view('profile.edit-profile', compact('profile'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'username'=>'required',
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required',
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'phone'=>'required'
        ]);
    
        $profile = User::findOrFail($id);
    
        if ($request->input('username') !== $profile->username) {
            $profile->username = $request->input('username');
        }
        if ($request->input('firstName') !== $profile->firstName) {
            $profile->firstName = $request->input('firstName');
        }
        if ($request->input('lastName') !== $profile->lastName) {
            $profile->lastName = $request->input('lastName');
        }
        if ($request->input('email') !== $profile->email) {
            $profile->email = $request->input('email');
        }
        if ($request->input('phone') !== $profile->phone) {
            $profile->phone = $request->input('phone');
        }

        if($request->has('avatar')) {
            $path = "images/avatar/";

            if ($profile->avatar && $profile->avatar !== 'avatarDefault.png') {
                File::delete($path . $profile->avatar);
            }
        
            $avatarName = time().'.'.$request->avatar->extension();  
           
            $request->avatar->move(public_path('images/avatar/'), $avatarName);  
        
            $profile->avatar = $avatarName;
        }
    
        $profile->save();

        return redirect('/student/profile/'.$profile->id);
    }

    public function learningPage(Request $request, $id)
    {
        $user = Auth::user()->id;
        $sequence = $request->input('sequence', 1);

        $course = Course::findOrFail($id);
        $module = $course->Module()->where('sequence', $sequence)->first();

        $attachment = Attachment::where('idModule', $module->id)
                    ->where('type', '0')
                    ->get();

        $currentSequence = $module ? $module->sequence : null;

        $currentProgres = Progres::where('idUser', $user)->where('idCourse', $id)->first();

        if($currentProgres){
            if($currentProgres->sequence < $currentSequence)
            $currentProgres->sequence = $currentSequence;

            $currentProgres->save();
        }else{
            $progres = new Progres;
    
            $progres->idUSer = $user;
            $progres->idCourse = $id;
            $progres->sequence = 1;

            $progres->save();
        }
    
        return view('students.learningPage', compact('currentProgres','module', 'course', 'currentSequence', 'attachment'));
    }

    public function storeAssignment(Request $request)
    {
        $request->validate([
            'assignment' => 'required|file|mimes:pdf,zip,rar|max:5048',
        ]);
    
        $fileName = time().'.'.$request->assignment->extension();
        $request->assignment->move(public_path('assignment/file/'), $fileName);
    
        $user = $request->user();
        $transaction = Transaction::where('idUser', $user->id)->first();
    
        if ($transaction) {
            $course = $transaction->Course()->first();
            // $module = $course->Module()->first();
            $module = $course->Module()->where('sequence', $request->input('sequence'))->first();
            
            $currentSequence = $module->sequence;
    
            $attachment = new Attachment;
    
            $attachment->assignment = $fileName;
            $attachment->score = $request->score;
            $attachment->type = '1';
            $attachment->idModule = $module->id;
            $attachment->idCourse = $course->id;
            $attachment->idUser = $user->id;
    
            $attachment->save();
    
            return redirect('student/learning-page/' . $course->id . '?sequence=' . $currentSequence);
        }
    }        
}
