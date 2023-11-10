<?php

namespace App\Services;

class CheckTableService
{
    public function __construct()
    {
    }

    public function check($model, $tableData, $data)
    {
        return $model->where($tableData, $data)->get();
    }
}
