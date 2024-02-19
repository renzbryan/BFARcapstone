<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileShare;
use Illuminate\Support\Facades\Storage;

class FileSending extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads');

        // Save file info in the database or associate it with the user

        return redirect('/upload')->with('success', 'File uploaded successfully');
    }

    public function shareFile(Request $request, $fileId)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Check if the user has permission to share the file

        $fileShare = new FileShare([
            'file_id' => $fileId,
            'user_id' => $request->input('user_id'),
        ]);

        $fileShare->save();

        return redirect('/upload')->with('success', 'File shared successfully');
    }
}
