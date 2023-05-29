<?php

namespace App\Http\Controllers;

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

    public function modules($id)
    {
        $modules = Module::where('idCourse', $id)->get();

        return view('teacher.module.view', compact('modules'));
    }
}
