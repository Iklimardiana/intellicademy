<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::get();
        return response()->json($course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Course::all();
        return response()->json($course);
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
            'description' => 'required',
            'thumbnail' => 'mimes:png,jpeg,jpg|max:2048',
            'idUser' => 'required',
        ]);
    
        // $thumbnailName = time().'.'.$request->thumbnail->extension();
        // $request->thumbnail->move(public_path('images'), $thumbnailName);
    
        $course = new Course;
    
        $course->name = $request->name;
        $course->price = $request->price;
        $course->idUser = $request->idUser;
        $course->thumbnail = $request->thumbnail;
        $course->description = $request->description;
    
        $course->save();
        // return response()->json($course);
        return redirect('/course');
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
        return response()->json($course);
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
        $course = Course::findOrFail($id);

        //Validasi data yang dikirimkan oleh pengguna

        $course->name = $request->name;
        $course->price = $request->price;
        $course->idUser = $request->idUser;
        $course->thumbnail = $request->thumbnail;
        $course->description = $request->description;

        $course->save();
        
        return response()->json($course);
        // return redirect('/course');
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
        $course_id = $course->id;

        $course->delete();

        return redirect('/course');
    }
}
