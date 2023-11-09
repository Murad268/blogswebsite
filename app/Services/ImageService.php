<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function __construct()
    {
    }


    public function storeImage($image,  $field)
    {
        if ($image) {
            $imagePath = $image->store($field, 'public');
            return $imagePath;
        } else {
            return null;
        }
    }



    public function updateImage($model, $newImage, $field,$key)
    {

        if ($newImage) {
            $existingImage = $model->$key;

            if ($existingImage) {
                Storage::disk('public')->delete($existingImage);
            }

            $newImagePath = $newImage->store($field, 'public');

            return $newImagePath;
        } else {
            return $model->$key;
        }
    }
}
