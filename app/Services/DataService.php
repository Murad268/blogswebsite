<?php

namespace App\Services;

use Exception;
use SebastianBergmann\Type\TrueType;

class DataService
{
    public function __construct(private ImageService $imageService)
    {
    }


    public function simple_create($model, $request, $route)
    {

        $created = $model->create($request->all());
        if ($created) {
            return redirect()->route($route);
        } else {
            dd('error');
        }
    }
    public function simple_update($model, $request, $route)
    {
        $updated = $model->update($request->all());


        if ($updated) {
            return redirect()->route($route);
        } else {
            dd('error');
        }
    }


    public function simple_create_withImage($model, $request, $field, $dir, $route)
    {
        try {
            $data = $request->all();
            foreach ($field as $key => $image) {
                $img = $this->imageService->storeImage($image, $dir . '/' . $key);
                $data[$key] = $img;
            }
            $newRequest = new \Illuminate\Http\Request($data);
            return $this->simple_create($model, $newRequest, $route);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }



    public function simple_update_withImage($model, $request, $field, $dir, $route)
    {
        try {
            $data = $request->all();
            foreach ($field as $key => $image) {
                $img = $this->imageService->updateImage($model, $image, $dir . '/' . $key, $key);
                $data[$key] = $img;
            }
            $newRequest = new \Illuminate\Http\Request($data);
            return $this->simple_update($model, $newRequest, $route);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }












    public function simple_delete($model, $route)
    {
        $deleted = $model->delete();
        if ($deleted) {
            return redirect()->route($route);
        }
    }
}
