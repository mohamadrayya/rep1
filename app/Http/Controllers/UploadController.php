<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    // هاد هو التابع المسؤول عن رفع الصورة وترجعلي الصورة
    public function uploadImage(Request $request)
    {
        // upload image
        if (!File::exists(storage_path('app/public/media'))) {
            File::makeDirectory(storage_path('app/public/media'));
        }
        $file = $request->image;
        $name = $file->hashName();
        $filename = time() . '.' . $name;
        $file->storeAs('public/media', $filename);
        return $filename;
    }
}
