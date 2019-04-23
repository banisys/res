<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;

class FileController extends Controller
{


    public function getFile($filename)
    {

        return response()->download(storage_path('app/public/upload/'.$filename), null, [], null);
    }
}
