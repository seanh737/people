<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function save_data(Request $request)
    {
        $fileName = "user_image.jpg";
        $path = $request->file('photo')->move(public_path("/"), $fileName);
        $photoURL = url('/'.$fileName);
        return response()->json(['url' => $photoURL], 200);
    }
    public function get_data()
    {
        return response()->download(public_path('user_image.jpg'), 'Logo');
    }
}
