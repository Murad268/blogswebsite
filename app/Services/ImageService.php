<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ImageService
{
    public function __construct()
    {
    }


    public function storeImage($image, $path)
    {
        if ($image && $image->isValid()) {
            $img = $image;
            $extension = $img->getClientOriginalExtension();
            $randomName = Str::random(10);
            $imagePath = 'assets/front/images/';

            if (!File::exists($imagePath)) {
                File::makeDirectory($imagePath, $mode = 0777, true, true);
            }

            $lastName = $randomName . "." . $extension;
            $lasPath = public_path($imagePath . $lastName);

            chmod($imagePath, 0777);

            Image::make($img)->save($lasPath);

            return $lastName;
        } else {
            return null;
        }
    }


    public function updateImage($model, $newImage, $field, $key)
    {

        $randomName = Str::random(10);
        $imagePath =  'assets/front/images/';

        $hasElement = $model->$key;

        if ($newImage) {
            if (file_exists($imagePath .  $hasElement) && $hasElement) {
                unlink($imagePath .  $hasElement);
            }
            $img = $newImage;
            $extension = $img->getClientOriginalExtension();
            $lastName = $randomName . "." . $extension;
            $lasPath = $imagePath . $randomName . "." . $extension;
            Image::make($img)->save($lasPath);
        } else {
            $lastName =   $hasElement;
        }

        return $lastName;
    }
}
