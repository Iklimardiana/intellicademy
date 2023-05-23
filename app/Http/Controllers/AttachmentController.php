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
        $attachment = Attachment::all();
        return response()->json($attachment);
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
            'link' => 'required',
            'category' => 'required',
            'type' => 'required',
            'idModule' => 'required',
            'idCourse' => 'required',
        ]);

        $attachment = new Attachment();

        $attachment->link = $request->link;
        $attachment->category = $request->category;
        $attachment->type = $request->type;
        $attachment->idModule = $request->idModule;
        $attachment->idCourse = $request->idCourse;

        $attachment->save();
        return redirect('/attachment');
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

        $attachment->link = $request->link;
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
