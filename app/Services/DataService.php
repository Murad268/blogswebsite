<?php

namespace App\Services;

use Exception;
use SebastianBergmann\Type\TrueType;

class DataService
{
    public function __construct(private ImageService $imageService)
    {
    }


    public function simple_create($model, $request)
    {

        $created = $model->create($request->all());
        if ($created) {
            return true;
        } else {
            return false;;
        }
    }
    public function simple_update($model, $request)
    {
        $updated = $model->update($request->all());

        if ($updated) {
            return true;
        } else {
            return false;;
        }
    }


    public function simple_create_withImage($model, $request, $field, $dir)
    {
        try {
            $data = $request->all();
            foreach ($field as $key => $image) {
                $img = $this->imageService->storeImage($image, $dir . '/' . $key);
                $data[$key] = $img;
            }
            $newRequest = new \Illuminate\Http\Request($data);
            return $this->simple_create($model, $newRequest);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }



    public function simple_update_withImage($model, $request, $field, $dir)
    {
        try {
            $data = $request->all();
            foreach ($field as $key => $image) {
                $img = $this->imageService->updateImage($model, $image, $dir . '/' . $key, $key);
                $data[$key] = $img;
            }
            $newRequest = new \Illuminate\Http\Request($data);
            return $this->simple_update($model, $newRequest);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }












    public function simple_delete($model)
    {
        $deleted = $model->delete();
        if ($deleted) {
            return true;
        } else {
            return false;;
        }
    }
}
