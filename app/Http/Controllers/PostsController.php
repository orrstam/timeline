<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\FileResource;

class PostsController extends Controller
{
    /**
     * Get all files.
     *
     * @return \App\Http\Resources\FileResource
     */
    public function index() {
        return response()->json(FileResource::collection(File::all()));
    }

    /**
     * Create new file.
     *
     * @return \App\Http\Resources\FileResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $path = Storage::putFile('uploads', $file);

            $newFile = File::create([
                'file_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'extension' => pathinfo($path, PATHINFO_EXTENSION),
                'path' => $path,
                'size' => $file->getClientSize(),
                'caption' => $request->caption ?? $request->caption
            ]);

            return response()->json(new FileResource($newFile));
        }
    }

}
