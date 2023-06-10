<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\User;
use App\Models\Course;
use App\Models\Module;
use App\Models\Transaction;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $id = Auth::user()->id;
        $courseCount = Course::where('idUser', $id)->count();
        $studentCount = User::where('role', '2') ->count();

        return view('teacher.dashboard', compact('courseCount', 'studentCount'));
    }

    public function students($id)
    {
        $students = User::where('role','2')->get();
        $transaction = Transaction::where('idCourse', $id)->get();
        return view('teacher.student.view', compact('transaction'));
    }

    public function courses($id)
    {
        $courses = Course::where('idUser', $id)->get();

        return view('teacher.course.view', compact('courses'));
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

        return redirect('/teacher/profile/'.$profile->id);
    }

    public function modules($id)
    {
        $modules = Module::where('idCourse', $id)
                ->orderBy('sequence', 'ASC')->get();
        $course = Course::find($id);

        return view('teacher.module.view', compact('modules', 'course'));
    }

    public function createModule($idCourse)
    {
        $course = Course::find($idCourse);
        return view('teacher.module.create', compact('course'));
    }

    public function storeModule(Request $request, $idCourse)
    {
        $request->validate([
            'sequence' => 'required',
            'name'=> 'required',
            'body'=> 'required'
        ]);

        $newSequence = $request->sequence;

        $existingModule = Module::where('idCourse', $idCourse)
            ->where('sequence', $newSequence)->first();

        if ($existingModule) {
            Module::where('idCourse', $idCourse)
                ->where('sequence', '>=', $newSequence)
                ->increment('sequence');
        }

        $module = new Module;

        $module->name = $request->name;
        $module->body = $request->input('body');
        // $module->name = Helper::processBase64Images($request->input('body'));
        $module->sequence = $request->sequence;
        $module->idCourse = $idCourse;

        $module->save();

        return redirect('/teacher/modules/' . $idCourse);
    }

    public function showModule($id)
    {
        $module = Module::findOrFail($id);
        return view('teacher.module.show', compact('module'));
    }

    public function editModule($id)
    {
        $module = Module::findOrFail($id);
        $course = Course::findOrFail($module->idCourse);
        
        return view('teacher.module.edit', compact('module', 'course'));
    }

    public function updateModule(Request $request, $id)
    {
        $request->validate([
            'sequence' => 'required',
            'name' => 'required',
            'body' => 'required'
        ]);
    
        $module = Module::findOrFail($id);
    
        $newSequence = $request->sequence;
    
        $existingModule = Module::where('idCourse', $module->idCourse)
            ->where('sequence', $newSequence)
            ->where('id', '!=', $id) // Menambahkan kondisi agar tidak memeriksa modul yang sedang diperbarui
            ->first();
    
        if ($existingModule) {
            Module::where('idCourse', $module->idCourse)
                ->where('sequence', '>=', $newSequence)
                ->where('id', '!=', $id) // Menambahkan kondisi agar tidak memperbarui modul yang sedang diperbarui
                ->increment('sequence');
        }
    
        $module->sequence = $request->sequence;
        $module->name = $request->name;
        $module->body = $request->input('body');
    
        $module->save();
    
        return redirect('/teacher/modules/'.$module->idCourse);
    }

    public function destroyModule($id)
    {
        $module = Module::findOrFail($id);

        $module->delete();

        return redirect('/teacher/modules/'.$module->idCourse);
    }

    public function assigments($id)
    {
        $attachments = Attachment::where('idModule', $id)->where('type', 1)->get();

        return view('teacher.assignment.view', compact('attachments'));
    }
}
