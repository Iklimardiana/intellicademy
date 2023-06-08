<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Controllers\CourseController;
use App\Controllers\TeacherController;

use App\Models\User;
use App\Models\Course;
use App\Models\Module;

class StudentController extends Controller
{
    public function dashboard()
    {
        $id = Auth::user()->id;

        $courses = Course::with('Module')->get();

        return view('students.dashboard', compact('courses'));

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
        $user = Auth::user();
        $sequence = $request->input('sequence', 1);

        $course = Course::findOrFail($id);
        $module = $course->Module()->where('sequence', $sequence)->first();

        $currentSequence = $module ? $module->sequence : null;
    
        return view('students.learningPage', compact('module', 'course', 'currentSequence'));
    }
}
