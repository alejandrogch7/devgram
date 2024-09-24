<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class ImageController extends Controller
{
    //
    public function store(Request $request)
    {
        $manager = new ImageManager(new Driver());

        $image = $request->file('file');

        $nameImage = Str::uuid() . "." . $image->extension();

        $imageServer = $manager->read($image);
        $imageServer->cover(1000, 1000);

        $imagePath = public_path('uploads') . "/" . $nameImage;
        $imageServer->save($imagePath);

        return response()->json(['image' => $nameImage ]);
    }
}
