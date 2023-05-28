<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class TeacherController extends Controller
{
    public function dashboard($id)
    {
        $courseCount = Course::where('idUser', 'id')->count();
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
        $courses = User::where('idUser', 'id')->get();

        return view('teacher.course.view', compact('courses'));
    }
}
