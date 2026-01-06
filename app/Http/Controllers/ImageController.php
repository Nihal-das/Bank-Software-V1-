<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /**
     * Show logged-in user's images
     */
    public function index()
    {
        $images = ImageUpload::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('customers.image_upload', compact('images'));
    }

    /**
     * Store uploaded image
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $file = $request->file('image');

        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $path = $file->store('images', 'private');

        ImageUpload::create([
            'file_name' => $filename,
            'file_path' => $path,
            'user_id'   => Auth::id(),
        ]);

        return back()->with('success', 'Image uploaded successfully');
    }

   
    public function show($id)
    {
        $image = ImageUpload::findOrFail($id);

        if ($image->user_id !== Auth::id()) {
            abort(403);
        }

        $fullPath = storage_path('app/private/' . $image->file_path);

        if (!is_file($fullPath)) {
            abort(404);
        }

        return response()->file($fullPath, [
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma'        => 'no-cache',
            'Expires'       => '0',
        ]);
    }   
}
