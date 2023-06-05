<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     *  for Upload an image.
     *
     * @param Request $request
     * @return string
     */
    public function upload(Request $request)
    {
        $fileName = time() . "-ws." . $request->file('image')->getClientOriginalExtension();

        // Store the uploaded image in the 'uploads' directory
        $request->file('image')->storeAs('uploads', $fileName);

        return "Image uploaded successfully.";
    }
}


