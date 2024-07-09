<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            
            // Move the uploaded file to the 'public/storage' directory
            $file->move(public_path('storage'), $filename);

            // Return the URL to access the uploaded image
            return response()->json([
                'url' => asset('storage/' . $filename)
            ]);
        }

        return response()->json(['error' => 'No file uploaded.'], 400);
    }
}
