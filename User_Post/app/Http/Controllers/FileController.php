<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function doUpload(Request $request)
    {
        $file = $request->filesTest;

        $file->move('upload', $file->getClientOriginalName());
    }
}
