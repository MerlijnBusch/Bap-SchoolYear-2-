<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Files;


class UploadfileController extends Controller
{
    function index()
    {
        return view('upload');
    }

    function upload(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|image|mimes:jpg,png,gif|max:2048'
        ]);
        $image = $request->file('select_file');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('images'), $new_name);

        $file = new Files;

        $file->path = $new_name;

        $file->save();

        return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
    }

    function show(Files $file){
        return view('show', compact('file'));
    }

}
