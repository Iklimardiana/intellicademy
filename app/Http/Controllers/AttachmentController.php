<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;

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
        $attachments = Attachment::all();

        return view('teacher.attachment.create', compact('attachments'));
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
            'assignment' => 'required',
            'score',
            'category' => 'required',
            'type' => 'required',
            'idModule' => 'required',
            'idCourse' => 'required',
            'idUser',
        ]);

        $attachment = new Attachment();

        $attachment->assignment = $request->assignment;
        $attachment->score = $request->score;
        $attachment->category = $request->category;
        $attachment->type = $request->type;
        $attachment->idModule = $request->idModule;
        $attachment->idCourse = $request->idCourse;
        $attachment->idUser = $attachment->idUser;

        $attachment->save();
        return redirect('/teacher/modules/{id}');
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
