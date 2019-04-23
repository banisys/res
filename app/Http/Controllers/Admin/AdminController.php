<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{

    public function thumbnail_uploader($file)
    {
        //https://www.webslesson.info/2018/09/upload-image-in-laravel-using-ajax.html
        $filename=time()."-".$file->getClientOriginalName();
        $img=Image::make($file);
        $img->resize(400,290);
        $img->save('uploads/thumbnail/'.$filename);
        return "/uploads/thumbnail/".$filename;
    }

    public function personel_uploader($file)
    {
        $filename=time()."-".$file->getClientOriginalName();
        $img=Image::make($file);
        $img->save('uploads/personel/'.$filename);
        return "/uploads/personel/".$filename;
    }

    public function scan_uploader($file)
    {
        $filename=time()."-".$file->getClientOriginalName();
        $img=Image::make($file);
        $img->save('uploads/scan/'.$filename);
        return "/uploads/scan/".$filename;
    }

    public function ImageUploader1($file, $paths)
    {
        $filename = time() . "-" . $file->getClientOriginalName();
        $path = public_path($paths);
        $files = $file->move($path, $filename);

        $img = Image::make($files->getRealPath());
        $img->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path . "small-" . $filename);
        return $paths . $filename;
    }
}
