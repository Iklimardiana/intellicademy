<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $courseCount = Course::count();
        $studentCount = User::where('role', '2')->count();
        $teacherCount = User::where('role', '1')->count();

        return view('admin.dashboard', compact('courseCount', 'studentCount', 'teacherCount'));
    }

    public function teachers()
    {
        $teachers = User::where('role', '1')->get();

        return view('admin.teachers.view', compact('teachers'));
    }

    public function createTeacher()
    {
        return view('admin.teachers.create');
    }

    public function storeTeacher(Request $request)
    {
        $str = Str::random(100);
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
        $user->role = '1';
        $user->key = $str;

        $user->save();

        return redirect('/admin/teachers');
    }

    public function destroyTeacher($id)
    {
        $teachers = User::findOrFail($id);

        if ($teachers->avatar != 'avatarDefault.png') {
            File::delete(public_path($teachers->avatar));
        }

        $teachers->delete();

        return redirect('/admin/teachers');
    }

    public function students()
    {
        $students = User::where('role','2')->get();

        return view('admin.students.view', compact('students'));
    }

    public function destroyStudent($id)
    {
        $students = User::findOrFail($id);

        if ($students->avatar != 'avatarDefault.png') {
            File::delete(public_path($students->avatar));
        }

        $students->delete();

        return redirect('/admin/students');
    }
}
