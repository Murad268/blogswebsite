<?php

namespace App\Services;

class DataService
{
    public function __construct()
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
}
