<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadImage(Request $request)

    {

        $image = $request->image;



        list($type, $image) = explode(';', $image);

        list(, $image)      = explode(',', $image);

        $image = base64_decode($image);

        $image_name = time().'.png';

        $path = 'assets/images/'.$image_name;



        file_put_contents($path, $image);

        return response()->json(['status'=>true]);

    }
}
