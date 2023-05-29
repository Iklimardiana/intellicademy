<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\Module;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $id = Auth::user()->id;
        $courseCount = Course::where('idUser', $id)->count();
        $studentCount = User::where('role', '2') ->count();

        return view('teacher.dashboard', compact('courseCount', 'studentCount'));
    }

    public function students()
    {
        $students = User::where('role','2')->get();

        return view('teacher.student.view', compact('students'));
    }

    public function courses($id)
    {
        $courses = Course::where('idUser', $id)->get();

        return view('teacher.course.view', compact('courses'));
    }

    public function indexProfile()
    {
        $profile = User::where('idUser', $id)->get();

        return view('teacher.profile');
    }

    public function editProfile($id)
    {
        $profile = User::findOrFail($id);

        return ('teacher.edit-profile');
    }

    public function storeProfile(Request $request)
    {
        $request->validate([
            'username',
            'email',
            'avatar' => 'mimes:png,jpeg,jpg|max:2048',
            'phone'
        ]);

        $avatarName = time().'.'.$request->avatar->extension();
        $request->thumbnail->move(public_path('images/avatar/'), $avatarName);
    
        $user = new User;
    
        $user->username = $request->username;
        $user->email = $request->email;
        $user->avatar = $avatarName;
        $user->phone = $phone;
    
        $user->save();
        return redirect('/teacher/profile');
    }

    public function modules($id)
    {
        $modules = Module::where('idCourse', $id)->get();

        return view('teacher.module.view', compact('modules'));
    }

    public function assigments($id)
    {
        $attachments = Attachment::where('idModule', $id)->where('type', 1)->get();

        return view('teacher.assignment.view', compact('attachments'));
    }
}
