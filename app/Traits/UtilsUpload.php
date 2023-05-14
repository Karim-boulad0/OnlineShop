<?php

namespace App\Traits;

use Illuminate\Http\Request; //

class UtilsUpload
{
    public function UploadImage(Request $request, $foldername, $namefilerequest, $whenstorage = 'admin')
    {
        $image = $request->file($namefilerequest)->getClientOriginalName();
        $path = $request->file($namefilerequest)->storeAs($foldername, $image, $whenstorage);
        return $path;
    }
}
