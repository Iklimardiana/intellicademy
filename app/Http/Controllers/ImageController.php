<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$request->image->extension();
            $destinationPath = public_path('images/moduleImage/');
            
            // Buat direktori tujuan jika belum ada
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
    
            $image->move($destinationPath, $imageName);
    
            // Mengembalikan URL gambar yang diunggah
            $imageUrl = asset('images/moduleImage/'.$imageName);
            return response()->json(['imageUrl' => $imageUrl]);
        }
    
        return response()->json(['error' => 'Image upload failed.']);
    }
}
