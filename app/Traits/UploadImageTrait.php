<?php

namespace App\Traits;

use App\Http\Requests\StoreMovieRequest;

trait UploadImageTrait
{
    public function uploadImage(StoreMovieRequest $request, $folderName)
    {
        //$image = $request->file('image')->getClientOriginalName();
        $image = time() . '.' . $request->file('image')->extension();
        $path = $request->file('image')->storeAs($folderName, $image, 'local');
        return $path;
    }
}    