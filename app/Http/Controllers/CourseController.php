<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::paginate(5);
        $iteration = $course->firstItem();
        return view('admin.courses.view', [
            'course' => $course,
            'iteration' => $iteration,
        ]);
    }

    public function indexGeneral()
    {
        
        if(Auth::check()){
            $id = Auth::user()->id;
            $course = Course::paginate(8);
            $transaction = Transaction::where('idUser', $id)->get();

            return view('courseGeneral.view', [
                'course' => $course,
                'transaction' => $transaction,
            ]);
        }
        $course = Course::paginate();

        return view('courseGeneral.view', ['course' => $course]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Course::all();
        $teachers = User::where('role', '1')->get(['id', 'username']);
        
        return view('admin.courses.create',compact('course', 'teachers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required|max:255',
            'thumbnail' => 'required|mimes:png,jpeg,jpg|max:2048',
            'idUser' => 'required',
        ]);
    
        $thumbnailName = time().'.'.$request->thumbnail->extension();
        $request->thumbnail->move(public_path('images/thumbnail/'), $thumbnailName);
    
        $course = new Course;
    
        $course->name = $request->name;
        $course->price = $request->price;
        $course->idUser = $request->idUser;
        $course->thumbnail = $thumbnailName;
        $course->description = $request->description;
    
        $course->save();
        // return response()->json($course);
        return redirect('/admin/course');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return response()->json($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $teachers = User::where('role', '1')->get(['id', 'username']);
        // return response()->json($course);
        return view('admin.courses.edit', compact('course', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required|max:255',
            'thumbnail' => 'mimes:png,jpeg,jpg|max:2048',
            'idUser' => 'required',
        ],[
            'idUser.required' => 'The Teacher field is required.',
        ]);

        $course = Course::findOrFail($id);

        if ($request->input('name') !== $course->name) {
            $course->name = $request->input('name');
        }
        if ($request->input('price') !== $course->price) {
            $course->price = $request->input('price');
        }
        if ($request->input('description') !== $course->description) {
            $course->description = $request->input('description');
        }
        if ($request->input('idUser') !== $course->idUser) {
            $course->idUser = $request->input('idUser');
        }

        if($request->has('thumbnail')) {
            $path = "images/thumbnail/";

            if ($course->thumbnail && $course->thumbnail !== 'defaultThumbnail.png') {
                File::delete($path . $course->thumbnail);
            }
        
            $thumbnailName = time().'.'.$request->thumbnail->extension();  
           
            $request->thumbnail->move(public_path('images/thumbnail/'), $thumbnailName);  
        
            $course->thumbnail = $thumbnailName;
        }

        $course->save();
        
        // return response()->json($course);
        return redirect('/admin/course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        if ($course->thumbnail != 'thumbnailDefault.png') {
            File::delete(public_path($course->thumbnail));
        }

        $course->delete();

        return redirect('/admin/course');
    }
}
