<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Attachment;
use App\Models\User;
use App\Models\Module;
use App\Models\Course;


class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attachment = Attachment::get();
        return response()->json($attachment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('teacher.attachment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'assignment' => 'required',
        ]);
        
        if ($request->has('assignment')) {
            $assignment = $request->file('assignment');
        
            if ($assignment->isValid()) {
                if ($assignment->getClientOriginalExtension() === 'pdf') {
                    $request->validate([
                        'assignment' => 'mimes:pdf|max:3048',
                    ]);
                } else { 
                    $request->validate([
                        'assignment' => 'url',
                    ], [
                        'assignment.url' => 'The assignment must be a valid URL.',
                    ]);
                }
            } else {
                return redirect()->back()->withErrors(['assignment' => 'The assignment field must be a file.']);
            }
        }

        $module = Module::findOrFail($id);

        $attachment = new Attachment();

        $attachment->assignment = $request->assignment;
        $attachment->score = $request->score;
        $attachment->category = $request->category;
        $attachment->type = $request->type;
        $attachment->idModule = $module->id;
        $attachment->idCourse = $request->idCourse;
        $attachment->idUser = $attachment->idUser;

        $attachment->save();
        return redirect('/teacher/modules/{id}', compact('module'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attachment = Attachment::findOrFail($id);
        return response()->json($attachment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attachment = Attachment::findOrFail($id);
        return response()->json($attachment);
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
        $attachment = Attachment::findOrFail($id);

        $attachment->assignment = $request->assignment;
        $attachment->category = $request->category;
        $attachment->type = $request->type;
        $attachment->idModule = $request->idModule;
        $attachment->idCourse = $request->idCourse;

        $attachment->save();

        return response()->json($attachment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attachment = Attachment::findOrFail($id);
        $attachment_id = $attachment->id;

        $attachment->delete();

        return redirect('/attachment');
    }
}
