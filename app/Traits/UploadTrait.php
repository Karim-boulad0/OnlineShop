<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\Request; //
use Illuminate\Http\UploadedFile;

trait UploadTrait
{


    public function UploadImage(Request $request, $foldername, $namefilerequest, $whenstorage = 'admin')
    {
        $image = $request->file($namefilerequest)->getClientOriginalName();
        $path = $request->file($namefilerequest)->storeAs($foldername, Str::random(10) . '_' . $image, $whenstorage);
        return $path;
    } // hydi zabtet bs blstore
    public function UploadImages(UploadedFile $file, $foldername, $namefilerequest, $whenstorage = 'admin')
    {
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs($foldername, Str::random(10) . '_' . $filename, $whenstorage);
        return $path;
    } // hydi li zabtet ma3 lservices bludate

    public function UploadMultiImages(Request $request, $foldername, $namefilerequest, $whenstorage = 'admin')
    {
        $images = [];

        if ($request->hasFile($namefilerequest)) {
            foreach ($request->file($namefilerequest) as $image) {
                $imageName = Str::random(10) . '_' . $image->getClientOriginalName();
                $path = $image->storeAs($foldername, $imageName, $whenstorage);
                $images[] = $path;
            }
        }

        return $images;
    } // for multi image
}
