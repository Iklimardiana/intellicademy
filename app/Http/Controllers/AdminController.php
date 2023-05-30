<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;

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

    public function destroyTeacher($id)
    {
        $teachers = User::findOrFail($id);

        if ($teachers->avatar != 'images/avatar/avatarDefault.png') {
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

        if ($students->avatar != 'images/avatar/avatarDefault.png') {
            File::delete(public_path($students->avatar));
        }

        $students->delete();

        return redirect('/admin/students');
    }
}
